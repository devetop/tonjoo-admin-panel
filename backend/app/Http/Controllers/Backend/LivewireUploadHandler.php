<?php

namespace App\Http\Controllers\Backend;

use Livewire\Controllers\FileUploadHandler;
use Livewire\FileUploadConfiguration;

class LivewireUploadHandler extends FileUploadHandler
{
    public function handle()
    {
        // abort_unless(request()->hasValidSignature(), 401);

        $disk = FileUploadConfiguration::disk();

        $filePaths = $this->validateAndStore(request('files'), $disk);

        return ['paths' => $filePaths];
    }
}
