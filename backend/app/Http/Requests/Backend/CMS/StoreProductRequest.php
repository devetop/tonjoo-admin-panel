<?php

namespace App\Http\Requests\Backend\CMS;

use App\Http\Enums\PostStatus;
use App\Rules\PostTermRule;
use App\Rules\SlugRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProductRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'author_id' => ['nullable'],
            'title' => ['required', 'string'],
            'slug' => ['string', 'nullable', (new SlugRule())],
            'content' => ['required', 'string'],
            'status' => ['required', Rule::in(PostStatus::allValues())],

            'meta.sub_title' => ['nullable', 'string'],
            'meta.meta_title' => ['nullable', 'string'],
            'meta.meta_description' => ['nullable', 'string'],
            'meta.featured_image' => ['nullable', 'string'], // buat validasi uploaded_file_url
            'meta.page_template' => ['required', Rule::in(\PageTemplates::listBackend('product'))],

            'term.product_category' => ['nullable', (new PostTermRule('product_category'))],
            'term.product_tag' => ['nullable', (new PostTermRule('product_tag'))],
        ];
        
        return $rules;
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