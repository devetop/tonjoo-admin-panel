<?php

namespace App\Services;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;

class DummyService
{
    public function paginateCollection(Collection $collection)
    {
        $perPage = request()->get('perPage', 10);
        $page = Paginator::resolveCurrentPage() ?? 1;

        $paginatedData = new LengthAwarePaginator(
            $collection->forPage($page, $perPage)->values(),
            $collection->count(),
            $perPage,
            $page,
            [
                'path' => Paginator::resolveCurrentPath(),
                'pageName' => 'page',
            ]
        );

        $paginatedData = $paginatedData
            ->withPath('#')
            ->appends(request()->all());

        return $paginatedData;
    }
}