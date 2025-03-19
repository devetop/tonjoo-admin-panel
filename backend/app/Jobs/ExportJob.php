<?php

namespace App\Jobs;

use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ExportJob implements ShouldQueue
{
    use Batchable, Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $exportable;

    private $path;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($exportable, $path)
    {
        $this->exportable = $exportable;
        $this->path = $path;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->exportable->store($this->path);
    }
}
