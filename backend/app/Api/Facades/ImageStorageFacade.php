<?php

namespace App\Api\Facades;

use Illuminate\Support\Facades\Facade;

class ImageStorageFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'image_store_api';
    }
}

