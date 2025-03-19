<?php

namespace App\Api\Contracts;

use Illuminate\View\View;

interface SideMenuInterface
{
    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view);
}
