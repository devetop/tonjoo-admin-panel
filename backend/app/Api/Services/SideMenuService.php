<?php

namespace App\Api\Services;

use App\Api\Config\SideMenuConfig;
use App\Api\Contracts\SideMenuInterface;
use Illuminate\View\View;

class SideMenuService implements SideMenuInterface
{
    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $listMenu = SideMenuConfig::instance()->make();

        $view->with('listSideMenu', $listMenu);
    }
}
