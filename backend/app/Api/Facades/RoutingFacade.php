<?php

namespace App\Api\Facades;

use Illuminate\Support\Facades\Facade;

class RoutingFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'routing_api';
    }
}

