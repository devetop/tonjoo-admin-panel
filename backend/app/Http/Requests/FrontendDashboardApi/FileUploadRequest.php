<?php

namespace App\Http\Requests\FrontendDashboardApi;

use App\Http\Enums\AvailableUploadPaths;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class FileUploadRequest extends FormRequest
{
    public function authorize()
    {
        $whiteListPaths = AvailableUploadPaths::all_values();
        if(!in_array($this->route('path'), $whiteListPaths)) {
            throw new AccessDeniedHttpException('invalid path');
        }
        return true;
    }

    public function rules()
    {
        switch ($this->route('path')) {
            case AvailableUploadPaths::IMAGES_PRODUCTS->value:
            case AvailableUploadPaths::IMAGES_PRODUCTS_SLIDERS->value:
                return [
                    'file' => ['required', 'mimes:jpg,jpeg,png', 'image', 'max:100'],
                ];
            case AvailableUploadPaths::FILE_EXAMPLE->value:
            case AvailableUploadPaths::PRIVATE_FILE_EXAMPLE->value:
                return [
                    'file' => ['required', 'mimes:jpg,jpeg,png'],
                ];
            default:
                return [
                    'file' => ['required']
                ];
        }
    }
}
