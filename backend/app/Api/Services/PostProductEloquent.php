<?php

namespace App\Api\Services;

use App\Api\Contracts\PostInterface;

class PostProductEloquent extends PostEloquent implements PostInterface {

    private function list_get_query() {
        $request = request();

        $filters = [
            'search' => $request->search,
            'column' => [
                'status' => ($request->status && $request->status !== 'all') ? $request->status : ''
            ],
            'relation' => [
                [
                    ['author', 'users.id', $request->author ? explode(',', $request->author) : null],
                ],
                [
                    ['terms', 'terms.id', $request->tag ? explode(',', $request->tag) : null],
                    ['terms.taxonomy', 'name', 'product_tag']
                ],
                [
                    ['terms', 'terms.id', $request->category ? explode(',', $request->category) : null],
                    ['terms.taxonomy', 'name', 'product_category']
                ]
            ],
        ];

        $orderBy = ($request->sortBy && $request->orderBy) ?
            [
                $request->sortBy => $request->orderBy
            ] : [
                'posts.id' => 'DESC'
            ];

        $perPage = $request->limit ?? 10;

        return [$filters, $orderBy, $perPage];
    }

    public function listAll()
    {
        [$filters, $orderBy, $perPage] = $this->list_get_query();

        $query = $this->model
            ->ofType('product');

        return $this->doListQuery($filters, $query, $orderBy, $perPage);
    }

    public function listMine()
    {
        [$filters, $orderBy, $perPage] = $this->list_get_query();

        $query = $this->model
            ->ofType('product')
            ->whereRelation('author', 'id', auth('frontend-dashboard')->id());

        return $this->doListQuery($filters, $query, $orderBy, $perPage);
    }

}