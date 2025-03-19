<?php

namespace App\Http\Controllers\Dummy\CMS;

use App\Http\Controllers\Controller;
use App\Services\DummyService;
use Database\Factories\PostFactory;

class MyProductController extends Controller
{
    public function __construct(
        private DummyService $dummyService,
    ) {
    }

    public function index()
    {
        context_authorize('dashboard', 'product-can-view-mine');

        $dummyPosts = app(PostFactory::class)
            ->count(40)
            ->withId()
            ->withTimestamps(true)
            ->state(function($item) { // untuk generate data yang berbeda tiap item
                return [
                    'author_name' => fake()->name(0),
                    'category' => join(',', fake()->words()),
                    'tag' => join(',', fake()->words()),
                    'slug' => strtolower(str_replace(' ', '-', $item['title'])),
                ];
            })
            ->make([ // untuk generate data yang sama di semua item
                'type' => 'product',
            ]);

        return response()->json([
            'data' => $this->dummyService->paginateCollection($dummyPosts)
        ]);
    }

    public function store()
    {
        context_authorize('dashboard', ['product-can-create-mine' => [1]]);

        return response()->json([
            'message' => 'Product successfully created.',
            'data' => request()->all()
        ], 201);
    }

    public function show($id)
    {
        context_authorize('dashboard', ['product-can-show-mine' => [$id]]);

        return response()->json([
            'data' => app(PostFactory::class)
                ->count(40)
                ->withId()
                ->withTimestamps(true)
                ->state(function($item) {
                    return [
                        'author_name' => fake()->name(0),
                        'category' => join(',', fake()->words()),
                        'tag' => join(',', fake()->words()),
                        'slug' => strtolower(str_replace(' ', '-', $item['title'])),
                    ];
                })
                ->makeOne(compact('id'))
        ]);
    }

    public function update($id)
    {
        context_authorize('dashboard', ['product-can-update-mine' => [$id]]);

        return response()->json([
            'message' => 'Product successfully updated.',
            'data' => request()->all()
        ], 200);
    }

    public function destroy($id)
    {
        context_authorize('dashboard', ['product-can-delete-mine' => [$id]]);

        return response()->json([
            'message' => 'Product successfully deleted.',
            'data' => request()->all()
        ], 200);
    }
}
