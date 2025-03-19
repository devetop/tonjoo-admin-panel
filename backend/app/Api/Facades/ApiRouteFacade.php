<?php

namespace App\Api\Facades;

use Illuminate\Support\Facades\Facade;

class ApiRouteFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'router_api';
    }
}
