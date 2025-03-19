<?php

namespace App\Api\Facades;

use Illuminate\Support\Facades\Facade;

class TermFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'term_api';
    }
}

