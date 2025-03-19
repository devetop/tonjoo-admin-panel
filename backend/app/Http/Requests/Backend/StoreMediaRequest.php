<?php

namespace App\Http\Requests\Backend;

use App\Http\Enums\PostStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreMediaRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required', 'string'],
            'status' => ['required', Rule::in(PostStatus::allValues())],
            'media_image' => ['nullable', 'file', 'image', 'max:2000'],
        ];
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
