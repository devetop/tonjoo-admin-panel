<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ImportAlert extends Component
{
    public $importing = false;

    public $importFinished = false;

    protected $listeners = ['importAlert'];

    public function importAlert($importing, $importFinished)
    {
        $this->importing = $importing;
        $this->importFinished = $importFinished;
    }

    public function render()
    {
        return view('livewire.import-alert');
    }
}
