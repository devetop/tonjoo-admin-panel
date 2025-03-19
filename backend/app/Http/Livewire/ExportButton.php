<?php

namespace App\Http\Livewire;

use App\Jobs\ExportJob;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Bus;
use Livewire\Component;

class ExportButton extends Component
{
    public $search;

    public $exportable;

    public $filename;

    protected $queryString = ['search'];

    public function mount($exportable, $filename)
    {
        $this->exportable = $exportable;
        $this->filename = $filename;
    }

    public function exportBatch()
    {
        if (! App::bound($this->exportable)) {
            $this->emit('alert', "Export service `{$this->exportable}` tidak ditemukan.", 'danger');
            return;
        }

        $date = now()->format('d-m-Y_H.i.s');
        $path = "exports/{$this->filename}_{$date}.xlsx";

        $exportable = App::make($this->exportable, [
            'search' => $this->search
        ]);

        $batch = Bus::batch([
            new ExportJob($exportable, $path),
        ])->dispatch();

        $this->emit('exportAlert', $batch->id, $path);
    }

    public function exportNormal()
    {
        if (! App::bound($this->exportable)) {
            $this->emit('alert', "Export service `{$this->exportable}` tidak ditemukan.", 'danger');
            return;
        }

        $date = now()->format('d-m-Y_H.i.s');

        $exportable = App::make($this->exportable, [
            'search' => $this->search
        ]);

        return $exportable->download("{$this->filename}_{$date}.xlsx");
    }

    public function render()
    {
        return view('livewire.export-button');
    }
}
