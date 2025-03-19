<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Requests\Backend\StoreOptionRequest;

use App\Api\Contracts\OptionInterface;
use Inertia\Inertia;

class MenuController extends Controller
{
    protected $optionApi;

    public function __construct(OptionInterface $optionApi)
    {
        $this->optionApi = $optionApi;
    }

    /**
     * Show menu option menu
     * @return \Inertia\Response
     */
    public function edit()
    {
        authorize('menu-option');

        $menus = $this->optionApi->get('menu', []);

        return Inertia::render('Menu/Edit', compact('menus'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  \App\Http\Requests\Backend\StoreOptionRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreOptionRequest $request)
    {
        authorize('menu-option');

        // $store_menu = $this->optionApi->set('menu', json_decode($request->menu_data, true) ?? []);
        // if ($store_menu) {
        //     return redirect(route('cms.option.menu'))
        //         ->with('status', 'Data successfully Saved.');
        // }
        // else{
        //     return redirect(route('cms.option.menu'))
        //         ->with('status', 'Failed save data.');
        // } 
        
        $store_menu = $this->optionApi->set('menu', $request->all() ?? []);
        if ($store_menu) {
            return to_route('cms.option.menu')->with('message', 'Data successfully Saved.');
        }
        else{
            return to_route('cms.option.menu')->with('error', 'Failed save data.');
        }
    }
}
