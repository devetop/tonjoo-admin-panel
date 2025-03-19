<?php

namespace App\Api\Config;

class ImageConfig
{
    public static function folder()
    {
        return config('cms.image.folder', 'images');
    }
}
