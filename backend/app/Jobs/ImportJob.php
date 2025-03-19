<?php

namespace App\Jobs;

use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class ImportJob implements ShouldQueue
{
    use Batchable, Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $importable;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($importable)
    {
        $this->importable = $importable;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->importable->handle();
    }
}
