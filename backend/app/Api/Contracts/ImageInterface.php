<?php

namespace App\Api\Contracts;

interface ImageInterface
{
    public function store($image, $resize = [], $path = '', $thumbnail = false);
    public function getUrl($path = '', $fileName = '');
    // public static function getUrlS3($path);
}
