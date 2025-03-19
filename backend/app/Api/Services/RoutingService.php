<?php

namespace App\Api\Services;

use App\Api\Contracts\RoutingInterface;
use App\Api\Contracts\OptionInterface;

class RoutingService implements RoutingInterface
{
    private $option;

    public function __construct(OptionInterface $option)
    {
        $this->option = $option;
    }

    /**
     * @return string $postType
     */
    public function getCurrentPostType()
    {
        $routeName = \Route::currentRouteName();
        $matches = [];

        $isMatch = preg_match('/(?<=frontend\.post-type\.)(.*)(?=\.)/', $routeName, $matches);
        if (!$isMatch) {
            $isMatch = preg_match('/(?<=frontend\.post-type\.)(.*)/', $routeName, $matches);
        }

        if ($isMatch && count($matches) > 0) return $matches[0];
    }

    /**
     * @return boolean
     */
    public function isSinglePostType()
    {
        $routeName = \Route::currentRouteName();
        $matches = [];

        $isMatch = preg_match('/(?<=frontend\.post-type\.)(.*)(?=\.single)/', $routeName, $matches);
        if ($isMatch) return true;

        //TODO
        //check catch-all

        return false;
    }

    public function isCatchAll()
    {
        $routeName = \Route::currentRouteName();
        if ($routeName == 'frontend.catch-all') {
            return true;
        }

        return false;
    }

    /**
     * @param string $url
     * @return boolean
     */
    public function isBackend(string $url)
    {
        $currentRoute = \Route::getRoutes()->match(\Request::create($url));

        if (!$currentRoute) return false;

        $routeName = $currentRoute->getName();
        if (\Str::startsWith($routeName, [ 'cms' ])) {
            return true;
        }
        return false;
    }

    public function getPermalink($post)
    {
        //check whether home page
        $options = $this->option->getMany([
            'home_page_type' => 'default',
            'home_page',
        ]);

        if ($options['home_page_type'] != 'default') {
            if ($options['home_page'] == $post->id) {
                return url('/');
            }
        }

        $catchAll = config('cms.frontend.routing.catch-all');
        $baseUrl = env('FRONTEND_WEB_BASEURL');

        if (!$baseUrl) {
            return '#';
        }

        $baseUrl = (substr($baseUrl, -1) !== '/') ? $baseUrl .'/': $baseUrl;
        
        //check whether catch all
        if (in_array($post->type, $catchAll)) {
            return $baseUrl . $post->slug;
        }

        return $baseUrl . $post->type . '/' . $post->slug;
    }
}
