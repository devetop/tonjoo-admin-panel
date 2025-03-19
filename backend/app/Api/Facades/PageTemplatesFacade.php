<?php

namespace App\Api\Facades;

use Illuminate\Support\Facades\Facade;

class PageTemplatesFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'page_templates_api';
    }
}

