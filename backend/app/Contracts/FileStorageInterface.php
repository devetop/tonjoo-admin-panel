<?php

namespace App\Contracts;

interface FileStorageInterface
{
    public function upload($file, $path = "/", $isPrivate = false);
    public function download($filePath, $fileName, $isPrivate = false);
    public function inline($filePath, $fileName);
    public function getUrl($path = NULL, $fileName = NULL, $isPrivate = false, $isImage = false);
    public function delete($file, $path);
    public function getPath($filePath, $isPrivate = false);
}
