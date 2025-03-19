<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Crypt;
use Rap2hpoutre\LaravelLogViewer\LaravelLogViewer;
use Illuminate\Support\Str;

class LogViewerController extends Controller
{
    private $logViewer;

    public function __construct(LaravelLogViewer $logViewer)
    {
        $this->middleware('auth:admin');
        $this->logViewer = $logViewer;
    }

    /**
     * Display view.
     *
     * @return \Inertia\Response
     */
    public function __invoke(Request $request)
    {
        authorize('tool-log-viewer');

        $smallest = $this->getSmallestFile();

        if ($request->l) {
            $this->logViewer->setFile(Crypt::decrypt($request->input('l')));
        } elseif (isset($smallest)) {
            $file = Crypt::encrypt($smallest);
            $this->logViewer->setFile(Crypt::decrypt($file));
        }

        if ($request->has('dl')) {
            return $this->download($this->logViewer->pathToLogFile(Crypt::decrypt($request->input('dl'))));
        } elseif ($request->has('del')) {
            app('files')->delete($this->logViewer->pathToLogFile(Crypt::decrypt($request->input('del'))));

            return $this->redirect($request->url());
        } elseif ($request->has('delall')) {
            foreach ($this->logViewer->getFiles(true) as $file) {
                app('files')->delete($this->logViewer->pathToLogFile($file));
            }

            return $this->redirect($request->url());
        }

        $data = [
            'files' => collect($this->logViewer->getFiles(true))
                ->map(fn($item) => [
                    'label' => $item,
                    'value' => \Illuminate\Support\Facades\Crypt::encrypt($item)
                ])
                ->toArray(),
            'current_file' => $this->logViewer->getFileName(),
            'encrypted_current_file' => \Illuminate\Support\Facades\Crypt::encrypt($this->logViewer->getFileName())
        ];

        $readCurrentFile = $this->logViewer->getFileName();
        $newData = $this->chunkReadFile($readCurrentFile, request('page', 1));

        $newData['pagination'] = $this->items($newData['total_page'], count(@$newData['logs'] ?? []));
        $newData['pagination']->appends($request->all());

        $data = array_merge($data, $newData);
        if ($request->wantsJson()) {
            return $data;
        }

        return inertia('Tool/LogViewer', compact('data'));
    }

    private function items($itemTotal, $currentPageItems)
    {
        $perPage = 1;

        $paginatedItems = new LengthAwarePaginator($currentPageItems, $itemTotal, $perPage);

        $paginatedItems->setPath(request()->url());

        return $paginatedItems;
    }

    private function getSmallestFile()
    {
        $files = glob(storage_path() . '/logs/' . (function_exists('config') ? config('logviewer.pattern', '*.log') : '*.log'));

        $allFiles = [];
        foreach ($files as $file) {
            $allFiles[] = [
                'file' => basename($file),
                'size' => filesize($file),
            ];
        }

        if (count($allFiles) > 0) {
            $collection = collect($allFiles)->sortBy('size')->first();
            return $collection['file'];
        }

        return null;
    }

    private function redirect($to)
    {
        if (function_exists('redirect')) {
            return redirect($to);
        }

        return app('redirect')->to($to);
    }

    private function download($data)
    {
        return response()->download($data);
    }

    private function chunkReadFile($file, $page = 1)
    {
        $realFile = storage_path() . '/logs/' . $file;
        $handle = fopen($realFile, "r");
        $chunkSize = 50000;
        $iterations = 0;

        $data = [];

        if ($handle) {

            //read backwards
            $position = filesize($realFile);
            //go to end of file
            fseek($handle, $position - 1);
            while ($position > 0) {
                $iterations++;

                //move pointer to one chunk from last read
                $position -= $chunkSize;
                if ($position < 0) {
                    $chunkSize = abs($position);
                    $position = 0;
                }
                fseek($handle, $position);

                //read chunk as normal
                if ($iterations == $page) {
                    try {
                        $chunk = fread($handle, $chunkSize);
                    } catch (\Throwable $th) {
                        $chunk = '';
                    }
                    $data['logs'] = $this->prettyLog($chunk);
                }
            }

            fclose($handle);
        }

        $data['logs']       = $data['logs'] ?? [];
        $data['total_page'] = $iterations;

        return $data;
    }

    private function prettyLog($file)
    {
        $logLevels = [
            'emergency',
            'alert',
            'critical',
            'error',
            'warning',
            'notice',
            'info',
            'debug',
            'processed',
            'failed',
        ];

        $levelsClasses = [
            'debug' => 'info',
            'info' => 'info',
            'notice' => 'info',
            'warning' => 'warning',
            'error' => 'danger',
            'critical' => 'danger',
            'alert' => 'danger',
            'emergency' => 'danger',
            'processed' => 'info',
            'failed' => 'warning',
        ];

        $levelsImgs = [
            'debug' => 'info-circle',
            'info' => 'info-circle',
            'notice' => 'info-circle',
            'warning' => 'exclamation-triangle',
            'error' => 'exclamation-triangle',
            'critical' => 'exclamation-triangle',
            'alert' => 'exclamation-triangle',
            'emergency' => 'exclamation-triangle',
            'processed' => 'info-circle',
            'failed' => 'exclamation-triangle',
        ];

        $pattern = '/\[\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}([\+-]\d{4})?\].*/';

        $log = [];

        preg_match_all($pattern, $file, $headings);

        if (! is_array($headings)) {
            return $log;
        }

        $logData = preg_split($pattern, $file);

        if ($logData[0] < 1) {
            array_shift($logData);
        }

        foreach ($headings as $h) {
            for ($i = 0, $j = count($h); $i < $j; $i++) {
                foreach ($logLevels as $level) {
                    if (strpos(strtolower($h[$i]), '.' . $level) || strpos(strtolower($h[$i]), $level . ':')) {
                        preg_match('/^\[(\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}([\+-]\d{4})?)\](?:.*?(\w+)\.|.*?)' . $level . ': (.*?)( in .*?:[0-9]+)?$/i', $h[$i], $current);
                        if (! isset($current[4])) {
                            continue;
                        }

                        $log[] = [
                            'context' => $current[3],
                            'level' => $level,
                            'level_class' => $levelsClasses[$level],
                            'level_img' => $levelsImgs[$level],
                            'date' => $current[1],
                            'text' => $current[4],
                            'in_file' => isset($current[5]) ? $current[5] : null,
                            'stack' => preg_replace("/^\n*/", '', $logData[$i]),
                        ];
                    }
                }
            }
        }

        return array_reverse($log);
    }
}
