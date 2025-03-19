<?php

namespace App\Api\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @deprecated
 */
class UserAuthorizationFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'user_authorization_api';
    }
}
