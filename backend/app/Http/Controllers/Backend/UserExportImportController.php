<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Jobs\ExportJob;
use App\Jobs\ImportJob;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Rap2hpoutre\LaravelLogViewer\LaravelLogViewer;

class UserExportImportController extends Controller
{
    public function import()
    {
        authorize('add-user');

        return inertia('User/Import');
    }

    public function importUpload(Request $request)
    {
        authorize('add-user');

        $import_service_name = 'user_importable';
        
        $request->validate([
            'excel' => 'required|mimes:xlsx'
        ]);

        if (! \App::bound($import_service_name)) {
            return back()->with('error', "Import service `{$import_service_name}` tidak ditemukan.");
        }

        $date = now()->format('dmYHis');
        $importLogPath = storage_path("logs/import-{$date}.log");
        \File::delete($importLogPath);

        $importFilePath = $request->file('excel')->store('imports');

        $importable = \App::make($import_service_name, [
            'importFilePath' => $importFilePath,
            'importLogPath' => $importLogPath,
        ]);

        ImportJob::dispatch($importable);
        
        return back()
            ->with('success', "Upload file berhasil, import service `{$import_service_name}` sedang berlangsung.")
            ->withCustom([
                'log_filepath' => "logs/import-{$date}.log",
                'excel_filepath' => $importFilePath,
            ]);
    }

    public function importProgress(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'log_filepath' => 'required',
            'excel_filepath' => 'required',
            'logs_count' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages());
        }

        $log_filepath = str_replace("logs/", "", $request->log_filepath);
        $excel_filepath = $request->excel_filepath;

        $laravelLogViewer = new LaravelLogViewer();
        $laravelLogViewer->setFile($log_filepath);
        $collection = collect($laravelLogViewer->all())->reverse();

        $isFinished = $this->checkIsFinished(
            $collection, 
            $request->logs_count,
            storage_path($request->log_filepath),
        );

        return response()->json([
            'data' => [
                'logs' => array_values($collection->toArray()),
            ],
            'status' => $isFinished ? 'done' : 'process',
        ]);
    }

    private function checkIsFinished(Collection $logCollection, $oldLogCount, $logFilepath)
    {
        if ((int) $oldLogCount === $logCollection->count()) {
            if (file_exists($logFilepath)) {
                unlink($logFilepath);
            }
            return true;
        }
        return false;
    }

    public function exportPage(Request $request)
    {
        $request->validate([
            'filename' => 'required|string'
        ]);

        $date = now()->format('d-m-Y_H.i.s');
        $exportable = \App::make('user_export', [
            'search' => $request->search
        ]);

        return $exportable->download("{$request->filename}_{$date}.xlsx");
    }

    public function exportBatch(Request $request)
    {
        $request->validate([
            'filename' => 'required|string',
        ]);

        $date = now()->format('d-m-Y_H.i.s');
        $path = "exports/{$request->filename}_{$date}.xlsx";

        $exportable = \App::make('user_export', [
            'search' => $request->search
        ]);

        $batch = \Bus::batch([
            new ExportJob($exportable, $path),
        ])->dispatch();

        return response()->json([
            'filename' => "{$request->filename}_{$date}.xlsx",
            'batchId' => $batch->id,
        ]);
    }

    public function exportProgress(Request $request)
    {
        $request->validate([
            'batchId' => 'required',
        ]);

        return response()->json([
            'exporting' => !\Bus::findBatch($request->batchId)->finished()
        ]);
    }

    public function exportDownload($filename) {
        return \Storage::download('exports/' . $filename);
    }
}
