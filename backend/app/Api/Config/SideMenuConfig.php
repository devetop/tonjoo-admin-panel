<?php

namespace App\Api\Config;

use Illuminate\Contracts\Config\Repository as Config;
use Illuminate\Support\Collection;

class SideMenuConfig
{
    private Config $config;
    private Collection $menu;

    private static SideMenuConfig $instances;

    public function __construct(Config $config, $configMenu) {
        $this->config = $config;
        $this->menu = $this->setCollection($config->get($configMenu, []));
    }

    public static function instance($configMenu = 'menu')
    {
        if (! isset(self::$instances)) {
            self::$instances = new static(app('config'), $configMenu);
        }

        return self::$instances;
    }

    public function make()
    {
        $menu = $this->menu->reject(fn ($menu) => ! \Authorized::has_capability($menu['capability']))
            ->map(function ($menu) {
                return Collection::make($menu)->when(array_key_exists('childs', $menu), function (Collection $menu) {
                    $menu['childs'] = Collection::make($menu['childs'])
                        ->reject(fn ($submenu) => ! \Authorized::has_capability($submenu['capability']))
                        ->sortBy('priority')
                        ->values();

                    return $menu;
                });
            })
            ->sortBy('priority')
            ->values();

        return $menu->toArray();
    }

    /**
     * @deprecated Use eventy filter `menu.add-side-menu` instead
     *
     * @param array $menu
     **/
    public function addMenu($menu)
    {
        if ($this->menu->has($menu['navbarId'])) return $this;

        $this->menu->put($menu['navbarId'], $menu);

        $this->config->set('menu', $this->menu);

        return $this;
    }

    /**
     * @param array $menu
     **/
    private function setCollection($menu)
    {
        if (\Auth::getDefaultDriver() === 'dashboard') {
            $menu = \Eventy::filter('menu.add-side-menu.dashboard', $menu);
        } else {
            $menu = \Eventy::filter('menu.add-side-menu', $menu);
        }
        
        return Collection::make($menu)->mapWithKeys(function ($menu) {
            $menu = \Eventy::filter('menu.add-side-submenu', $menu);

            return [
                $menu['navbarId'] => $menu
            ];
        });
    }
}
