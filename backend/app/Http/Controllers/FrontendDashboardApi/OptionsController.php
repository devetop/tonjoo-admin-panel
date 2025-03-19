<?php

namespace App\Http\Controllers\FrontendDashboardApi;

use App\Api\Contracts\OptionInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OptionsController extends Controller
{
    public function __construct(
        private OptionInterface $optionApi
    ) {
    }

    public function show($optionName)
    {
        switch ($optionName) {
            case 'terms-of-service':
                $configOptionName = 'web_term_of_service';
                break;
            case 'privacy-policy':
                $configOptionName = 'web_privacy_policy';
                break;
            default:
                $configOptionName = '';
                break;
        }
        return response()->json([
            'data' => $this->optionApi->get($configOptionName, ''),
        ]);
    }
}
