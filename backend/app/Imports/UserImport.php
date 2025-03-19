<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Psr\Log\LoggerInterface;

class UserImport implements ToModel, WithStartRow, WithHeadingRow, WithChunkReading, WithValidation
{
    use Importable;

    private $log;

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $user = new User([
            'name' => $row['name'],
            'email' => $row['email'],
            'password' => Hash::make('secret'),
            'verified_at' => $row['verified_at'],
        ]);

        $this->log->info("Import User {$user->email}");

        return $user;
    }

    public function rules(): array
    {
        return [
            '*.email' => Rule::unique('users', 'email'), // Table name, field in your db
        ];
    }

    /**
     * @return int
     */
    public function startRow(): int
    {
        return 2;
    }

    /**
     * @return int
     */
    public function chunkSize(): int
    {
        return 1000;
    }

    public function setLog(LoggerInterface $log)
    {
        $this->log = $log;

        return $this;
    }
}
