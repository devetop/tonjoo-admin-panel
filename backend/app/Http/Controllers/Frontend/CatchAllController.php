<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use App\Api\Contracts\CatchAllInterface;

class CatchAllController extends Controller
{
    private $handler;

    public function __construct(CatchAllInterface $handler)
    {
        $this->handler = $handler;
    }

    public function index($catch_all, Request $request)
    {
        return $this->handler->handle($catch_all, $request);
    }

}

