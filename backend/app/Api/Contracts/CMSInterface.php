<?php

namespace App\Api\Contracts;

use Illuminate\Contracts\Foundation\Application;

interface CMSInterface
{
    public function enable();

    public function boot();
}
