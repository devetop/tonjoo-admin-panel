<?php

namespace App\Api\Contracts;
use Illuminate\Http\UploadedFile;

interface ImageStorageInterface
{
    public function uploadImage(UploadedFile $image, $resize = [], $path = "/", $thumnail = FALSE);
    //public function getUrlS3($path);
    public function getUrl($path = NULL, $fileName = NULL, $defaultUrl = NULL);
    public function deleteImage($image, $path, $thumnail = FALSE);
}
