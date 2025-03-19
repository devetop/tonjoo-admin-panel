<?php

namespace App\Api\Contracts;

use Illuminate\Http\Request;

interface CatchAllInterface
{
    public function handle($path, Request $request);
}

