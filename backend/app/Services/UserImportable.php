<?php

namespace App\Services;

use App\Api\Contracts\ImportableAbstract;
use App\Imports\UserImport;
use Illuminate\Support\Facades\Storage;

class UserImportable extends ImportableAbstract
{
    protected $userImport;

    public function __construct(UserImport $userImport, $importFilePath, $importLogPath)
    {
        parent::__construct($importFilePath, $importLogPath);

        $this->userImport = $userImport;
    }

    public function handle(): void
    {
        $this->importLog->warning('Starting import data...');

        try {
            $this->userImport->setLog($this->importLog)->import($this->importFilePath);

            $this->importLog->warning('Import data completed...');
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            $failures = $e->failures();

            /** @var \Maatwebsite\Excel\Validators\Failure $failure */
            foreach ($failures as $failure) {
                foreach ($failure->errors() as $message) {
                    $error = __('There was an error on row :row. :message', ['row' => $failure->row(), 'message' => $message]);
                    $this->importLog->error($error);
                }
            }

            Storage::delete($this->importFilePath);

            $this->importLog->warning('Import data completed with error...');
        }
    }
}
