<?php

namespace App\Api\Facades;

use Illuminate\Support\Facades\Facade;

class UserCapabilityFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'user_capability';
    }
}
