<?php

namespace App\Api\Contracts;

use Illuminate\Support\Facades\Log;
use Psr\Log\LoggerInterface;

// Parent class
abstract class ImportableAbstract
{
    protected string $importFilePath;

    protected string $importLogPath;

    protected LoggerInterface $importLog;

    public function __construct(string $importFilePath, string $importLogPath)
    {
        $this->importFilePath = $importFilePath;
        $this->importLogPath = $importLogPath;
    }

    public function __wakeup()
    {
        $this->importLog = Log::build([
            'driver' => 'single',
            'path' => $this->importLogPath,
        ]);
    }

    abstract public function handle(): void;
}
