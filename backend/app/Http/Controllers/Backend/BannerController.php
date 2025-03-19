<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Requests\Backend\StoreOptionRequest;

use App\Api\Contracts\OptionInterface;

class BannerController extends Controller
{
    protected $optionApi;

    public function __construct(OptionInterface $optionApi)
    {
        $this->optionApi = $optionApi;
    }

    /**
     * Show banner option menu
     * @return \Inertia\Response
     */
    public function edit()
    {
        authorize('banner-option');

        $banners = $this->optionApi->get('banner', []);
        return inertia('Option/Banner', compact('banners'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  \App\Http\Requests\Backend\StoreBannerRequest $request
     * @return Renderable
     */
    public function store(StoreOptionRequest $request)
    {
        authorize('banner-option');

        $store_banner = $this->optionApi->set('banner', $request->all() ?? '');
        if ($store_banner) {
            return redirect(route('cms.option.banner'))
                ->with('success', 'Data successfully Saved.');
        }
        else{
            return redirect(route('cms.option.banner'))
                ->with('error', 'Failed save data.');
        }
    }
}
