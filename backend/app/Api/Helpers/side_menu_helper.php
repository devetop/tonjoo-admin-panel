<?php

if (! function_exists('add_side_menu')) {
    /**
     * Add new menu into side menu dashboard \
     * If `navbarId` is not unique, the old menu will be replaced
     *
     * @param array $args
     * @return void
     **/
    function add_side_menu($args)
    {
        if (@$args['guard']) {
            \Eventy::addFilter('menu.add-side-menu.' . @$args['guard'], fn ($menu) => \Arr::prepend($menu, $args), 10, 1);
        }
        \Eventy::addFilter('menu.add-side-menu', fn ($menu) => \Arr::prepend($menu, $args), 10, 1);
    }
}

if (! function_exists('add_side_submenu')) {
    /**
     * Add new submenu into parent side menu dashboard \
     *
     * @param array $args
     * @return void
     **/
    function add_side_submenu($args, $parentId)
    {
        \Eventy::addFilter('menu.add-side-submenu', function ($menu) use ($args, $parentId) {
            if ($menu['navbarId'] == $parentId) {
                $menu['childs'] = \Arr::prepend($menu['childs'] ?? [], $args);
            }

            return $menu;
        });
    }
}
