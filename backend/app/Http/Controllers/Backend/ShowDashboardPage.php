<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Routing\Controller;

class ShowDashboardPage extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display cms dashboard page.
     *
     * @return \Inertia\Response
     */
    public function __invoke()
    {
        return inertia('Dashboard/Index');
    }
}
