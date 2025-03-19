<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class ExportAlert extends Component
{
    public $batchId;

    public $exporting = false;

    public $exportFinished = false;

    public $path;

    protected $listeners = ['exportAlert'];

    public function getExportBatchProperty()
    {
        if (! $this->batchId) {
            return null;
        }

        return Bus::findBatch($this->batchId);
    }

    public function updateExportProgress()
    {
        $this->exportFinished = $this->exportBatch->finished();

        if ($this->exportFinished) {
            $this->exporting = false;
        }
    }

    public function downloadExport()
    {
        return Storage::download($this->path);
    }

    public function exportAlert($batchId, $path)
    {
        $this->batchId = $batchId;
        $this->exporting = true;
        $this->path = $path;
    }

    public function render()
    {
        return view('livewire.export-alert');
    }
}
