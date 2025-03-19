<?php

namespace App\Api\Facades;

use Illuminate\Support\Facades\Facade;

class PageFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'page_api';
    }
}

