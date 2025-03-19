<?php

namespace App\Api\Config;

class AuthConfig
{
    public static function contexts()
    {
        return config('cms.auth.contexts', []);
    }
}
