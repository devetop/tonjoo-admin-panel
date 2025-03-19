<?php

namespace App\Api\Facades;

use Illuminate\Support\Facades\Facade;

class PostFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'post_api';
    }
}
