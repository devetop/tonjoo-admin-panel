<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Alert extends Component
{
    public $show = false;

    public $message;

    public $status;

    protected $listeners = ['alert'];

    public function alert($message, ?string $status = 'success')
    {
        $this->message = $message;
        $this->status = $status;
        $this->show = true;
    }

    public function render()
    {
        return view('livewire.alert');
    }
}
