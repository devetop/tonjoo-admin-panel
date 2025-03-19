<?php

namespace App\Api\Contracts;

interface RoutingInterface
{
    /**
     * @return string $postType
     */
    public function getCurrentPostType();

    /**
     * @return boolean
     */
    public function isSinglePostType();

    public function isBackend(string $url);

    public function isCatchAll();

    public function getPermalink($post);
}
