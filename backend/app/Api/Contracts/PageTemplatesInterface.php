<?php

namespace App\Api\Contracts;

interface PageTemplatesInterface
{
    public function listBackend(string $postType, $default = []);
    public function getFrontendReact($post);
    public function getFrontendPostTypeReact($postType);
}
