<?php

namespace App\Capabilities;

use App\Api\Services\PostProductEloquent;

class Product
{
    public function __construct(
        private PostProductEloquent $postProductEloquent,
    ) {
    }

    public function mine($productId)
    {
        $product = $this->postProductEloquent->find($productId);

        if ($product->author_id == \Auth::user()->id) {
            return true;
        }

        return false;
    }

}
