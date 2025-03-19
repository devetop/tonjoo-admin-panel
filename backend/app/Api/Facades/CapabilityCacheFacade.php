<?php

namespace App\Api\Facades;

use Illuminate\Support\Facades\Facade;

class CapabilityCacheFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'capability_cache';
    }
}
