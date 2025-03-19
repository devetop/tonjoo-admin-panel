<?php

namespace App\Api\Contracts;

interface RouteInterface
{
    public function addRoute($route, $location = 'cms');

    public function cmsBuild();

    public function build($location);

    public function buildAll();

    public function validate(&$route);

    public function buildRoute($menuRoute);
}
