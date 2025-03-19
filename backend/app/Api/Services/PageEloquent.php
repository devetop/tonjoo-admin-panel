<?php

namespace App\Api\Services;

use App\Api\Contracts\PageInterface;
use App\Models\Post;

class PageEloquent implements PageInterface
{
    private $model;

    public function __construct(Post $model)
    {
        $this->model = $model;
    }

    public function single($slug)
    {
        return $this->model
                    ->typePage()
                    ->where('slug', $slug)
                    ->first();
    }

}
