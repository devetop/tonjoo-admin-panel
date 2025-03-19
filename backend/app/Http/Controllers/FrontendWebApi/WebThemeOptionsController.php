<?php

namespace App\Http\Controllers\FrontendWebApi;

use App\Api\Contracts\OptionInterface;
use App\Http\Controllers\Controller;

class WebThemeOptionsController extends Controller
{
    public function __construct(
        private OptionInterface $optionApi,
    ) { }

    public function __invoke() {
        $data = [
            'web_menu' => $this->optionApi->get('menu', []),
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

        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }
}
