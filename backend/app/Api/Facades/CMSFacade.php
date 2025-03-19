<?php

namespace App\Api\Facades;

use Illuminate\Support\Facades\Facade;

class CMSFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'cms_service';
    }
}
