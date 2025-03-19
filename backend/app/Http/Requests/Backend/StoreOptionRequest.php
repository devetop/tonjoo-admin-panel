<?php

namespace App\Http\Requests\Backend;

use App\Models\Option;
use Illuminate\Foundation\Http\FormRequest;

class StoreOptionRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if ($this->route()->getName() === 'cms.option.general.store') {
            return [
                'web_logo' => $this->imageRules('web_logo'),
                'web_logo_white' => $this->imageRules('web_logo_white'),
                'web_title' => ['required', 'string'],
                'web_description' => ['required', 'string'],
                'web_footer_address' => ['nullable', 'string'],
                'web_footer_phone' => ['nullable', 'string'],
                'web_footer_email' => ['nullable', 'string', 'email'],
                'web_footer_social_fb' => ['nullable', 'string', 'url' => 'url:http,https',],
                'web_footer_social_ig' => ['nullable', 'string', 'url' => 'url:http,https',],
                'web_footer_social_x' => ['nullable', 'string', 'url' => 'url:http,https',],
                'web_footer_social_in' => ['nullable', 'string', 'url' => 'url:http,https',],
                'web_footer_social_yt' => ['nullable', 'string', 'url' => 'url:http,https',],
            ];
        }

        return [
            'menu[].*' => ['required', 'string'],
            'favicon' => ['nullable', 'file', 'image', 'max:50', 'dimensions:max_width=100,max_height=100'],
        ];
    }

    private function imageRules(string $inputName)
    {
        if (@$this->all()[$inputName] === null) return 'nullable';
        return is_string(@$this->all()[$inputName]) ? [ 'required', 'string'] : ['required', 'file', 'image', 'mimes:jpg,jpeg,png,gif,bmp,webp'];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
