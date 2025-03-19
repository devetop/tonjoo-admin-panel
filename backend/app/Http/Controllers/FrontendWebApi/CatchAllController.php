<?php

namespace App\Http\Controllers\FrontendWebApi;

use App\Api\Contracts\CatchAllInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CatchAllController extends Controller
{
    public function __construct(
        private CatchAllInterface $handler,
    ) {}

    public function single(Request $request, $catch_all)
    {
        return $this->handler->handle($catch_all, $request);
    }
}
