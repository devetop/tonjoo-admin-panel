<?php
namespace App\Api\Services;

use App\Api\Contracts\RouteInterface;
use Illuminate\Config\Repository;
use Illuminate\Support\Facades\Route;

class RouteService implements RouteInterface
{
    protected Repository $config;

    public function __construct($config)
    {
        $this->config = $config;
    }

    public function addRoute($route, $location = 'cms')
    {
        $this->validate($route);

        $menuRoutes = $this->config->get('cms.routes.'.$location, []);

        array_push($menuRoutes, $route);

        $this->config->set('cms.routes.'.$location, $menuRoutes);
    }

    public function cmsBuild()
    {
        $this->build('cms');
    }

    public function build($location)
    {
        $menuRoutes = $this->config->get("cms.routes.$location", []);

        foreach ($menuRoutes as $menuRoute) {
            $this->buildRoute($menuRoute);
        }
    }

    public function buildAll()
    {
        $allMenuRoutes = $this->config->get("cms.routes", []);

        foreach ($allMenuRoutes as $menuRoutes) {
            foreach ($menuRoutes as $menuRoute) {
                $this->buildRoute($menuRoute);
            }
        }
    }

    public function validate(&$route)
    {
        if (!isset($route['slug'])) {
            throw new \Exception(__('Menu must have route slug paramater'));
            return;
        }

        if (!isset($route['args'])) {
            throw new \Exception(__('Menu must have route args paramater'));
            return;
        }

        if (!isset($route['args']['as'])) {
            throw new \Exception(__('Menu must have a route name'));
            return;
        }

        if (!isset($route['args']['uses'])) {
            throw new \Exception(__('Menu must have a route controller'));
            return;
        }

        if (!isset($route['method'])) {
            $route['method'] = 'GET';
        }
    }

    public function buildRoute($menuRoute)
    {
        $method = strtoupper($menuRoute['method']);
        $route = Route::addRoute($method, $menuRoute['slug'], $menuRoute['args']);
        if (isset($menuRoute['middlewares'])) {
            $route->middleware($menuRoute['middlewares']);
        }
    }
}

