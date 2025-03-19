<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Routing\Controller;
use App\Http\Requests\Backend\StoreOptionRequest;

use App\Api\Contracts\OptionInterface;
use App\Api\Contracts\ImageStorageInterface;

class OptionController extends Controller
{
    private $optionApi;
    private $imageStorage;

    public function __construct(
        OptionInterface $optionApi,
        ImageStorageInterface $imageStorage
    )
    {
        $this->optionApi = $optionApi;
        $this->imageStorage = $imageStorage;
    }

    /**
     * Show general option menu
     * @return \Inertia\Response
     */
    public function edit()
    {
        authorize('general-option');

        $keys  = \Eventy::filter('option.general.keys', [
            'web_title' => config('app.name'),
            'web_description',

            'web_terms_of_service' => '',
            'web_privacy_policy' => '',

            'header_script',
            'header_css',
            'footer_script',
            'footer_css',
            'favicon'
        ]);

        $options = $this->optionApi->getMany($keys, null);

        $generals = (object) $options;
        
        // apakah service CMS dalam keadaan aktif?
        $isCmsEnabled = app(\App\Api\Contracts\CMSInterface::class)->isEnabled();
        $homePageTypes = [
            [
                'text' => 'Default',
                'value' => 'default',
            ],
            [
                'text' => 'Page',
                'value' => 'page',
            ],
        ];

        $generals->old_favicon_old = \ImageStorage::getUrl('option/', @$generals->favicon ?? '');
        return inertia('Option/General', compact('generals', 'isCmsEnabled', 'homePageTypes'));
    }

    public function edit_frontend_web_theme_options()
    {
        $data = [
            'web_logo' => \ImageStorage::getUrl('option/', $this->optionApi->get('web_logo', ''), url('assets/frontend/assets/img/lorem-logo.svg')),
            'web_logo_white' => \ImageStorage::getUrl('option/', $this->optionApi->get('web_logo_white', ''), url('assets/frontend/assets/img/lorem-logo-white.svg')),
            'web_default_title' => $this->optionApi->get('web_default_title', 'TAP - Frontend Web'),
            'web_footer_address' => $this->optionApi->get('web_footer_address', 'Jl. Tongkol Raya, Mladangan, Minomartani, Kec. Ngaglik, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55581'),
            'web_footer_phone' => $this->optionApi->get('web_footer_phone', '0812-XXXX-XXXX'),
            'web_footer_email' => $this->optionApi->get('web_footer_email', 'hello@emailcorporate.com'),
            'web_footer_social_fb' => $this->optionApi->get('web_footer_social_fb', '#'),
            'web_footer_social_ig' => $this->optionApi->get('web_footer_social_ig', '#'),
            'web_footer_social_x' => $this->optionApi->get('web_footer_social_x', '#'),
            'web_footer_social_in' => $this->optionApi->get('web_footer_social_in', '#'),
            'web_footer_social_yt' => $this->optionApi->get('web_footer_social_yt', '#'),
        ];
        return inertia('Option/FrontendWebThemeOptions', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  \App\Http\Requests\Backend\StoreOptionRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreOptionRequest $request)
    {
        authorize('general-option');

        $options = $request->all();
        if (!empty($options)) {
            foreach ($options as $key => $value) {
                if ($request->hasFile($key)) {

                    $optionImage = $this->imageStorage->uploadImage($request->file($key), [], 'option/', TRUE);
                    
                    if (!empty($options['last_'.$key]) && $optionImage) {
                        $this->imageStorage->deleteImage($options['last_'.$key], 'option/', TRUE);
                    }

                    if (!empty($optionImage)) {
                        $this->optionApi->set($key, $optionImage);
                    }

                } else {
                    $this->optionApi->set($key, $value ?? '');
                }
            }
            return back()->with('success', 'Data successfully Saved.');
        }

        return back()->with('error', 'Failed save data.');
    }
}
