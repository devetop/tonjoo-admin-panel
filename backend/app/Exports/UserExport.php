<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class UserExport implements FromQuery, WithHeadings, WithMapping
{
    use Exportable;

    private $search;

    public function __construct(?string $search = null)
    {
        $this->search = $search;
    }

    public function query()
    {
        return User::query()
            ->when($this->search, function (Builder $q) {
                $q->where('name', 'like', "%{$this->search}%");
                $q->where('email', 'like', "%{$this->search}%", 'or');
            });
    }

    public function headings(): array
    {
        return [
            '#',
            'Name',
            'Email',
            'Verified At',
            'Created At'
        ];
    }

    public function map($user): array
    {
        return [
            $user->id,
            $user->name,
            $user->email,
            $user->email_verified_at,
            $user->created_at
        ];
    }

    public function fields(): array
    {
        return [
            'id',
            'name',
            'email',
            'email_verified_at',
            'created_at'
        ];
    }
}
