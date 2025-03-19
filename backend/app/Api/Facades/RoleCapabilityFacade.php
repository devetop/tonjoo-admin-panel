<?php

namespace App\Api\Facades;

use Illuminate\Support\Facades\Facade;

class RoleCapabilityFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'role_capability';
    }
}
