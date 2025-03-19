<?php

namespace App\Http\Livewire;

use App\Jobs\ImportJob;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Rap2hpoutre\LaravelLogViewer\LaravelLogViewer;

class ImportForm extends Component
{
    use WithFileUploads;

    public $logData;

    public $importLogPath;

    public $oldCount = 0;

    public $importFile;

    public $importFilePath;

    public $importing = false;

    public $importFinished = false;

    public $importable;

    public $iteration = 0;

    protected $rules = [
        'importFile' => 'required|mimes:xlsx',
    ];

    public function mount($importable)
    {
        $this->importable = $importable;
    }

    public function updateImportDisplay()
    {
        $this->logData = $this->getLog();
    }

    public function import()
    {
        $this->validate();

        if (! App::bound($this->importable)) {
            $this->emit('alert', "Import service `{$this->importable}` tidak ditemukan.", 'danger');
            return;
        }

        $date = now()->format('dmYHis');
        $this->importLogPath = storage_path("logs/import-{$date}.log");
        File::delete($this->importLogPath);

        $this->importFilePath = $this->importFile->store('imports');

        $importable = App::make($this->importable, [
            'importFilePath' => $this->importFilePath,
            'importLogPath' => $this->importLogPath,
        ]);

        $this->importing = true;

        $this->emit('importAlert', $this->importing, $this->importFinished);

        ImportJob::dispatch($importable);
    }

    public function render()
    {
        return view('livewire.import-form');
    }

    private function getLog()
    {
        if (! File::exists($this->importLogPath)) {
            return null;
        }

        $laravelLogViewer = new LaravelLogViewer();

        $laravelLogViewer->setFile($this->importLogPath);

        $collection = Collection::make($laravelLogViewer->all())->reverse();

        $this->checkFinished($collection);

        return $collection->map(function ($item) {
            $item['text'] = __('<div class="text-:level_class">:text</div>', $item);
            return $item;
        })->implode('text');
    }

    private function checkFinished(Collection $collection)
    {
        if ($this->oldCount === $collection->count()) {
            $this->importing = false;
            $this->importFinished = true;
            $this->importFile = null;
            $this->iteration++;

            Storage::delete($this->importFilePath);
            File::delete($this->importLogPath);

            $this->emit('importAlert', $this->importing, $this->importFinished);
        }

        $this->oldCount = $collection->count();
    }
}
