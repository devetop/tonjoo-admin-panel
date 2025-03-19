<?php

namespace App\Http\Requests\Backend\CMS;

use App\Http\Enums\AvailableUploadPaths;
use App\Http\Enums\PostStatus;
use App\Rules\FileUploadPath;
use App\Rules\PostTermRule;
use App\Rules\SlugRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProductRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'author_id' => ['required'],
            'title' => ['required', 'string'],
            'slug' => ['required', 'string', 'nullable', (new SlugRule())],
            'content' => ['required', 'string'],
            'status' => ['required', Rule::in(PostStatus::allValues())],

            'meta.sub_title' => ['nullable', 'string'],
            'meta.meta_title' => ['nullable', 'string'],
            'meta.meta_description' => ['nullable', 'string'],
            'meta.featured_image_url' => ['nullable', 'string', 'url', new FileUploadPath(AvailableUploadPaths::IMAGES_PRODUCTS->value)],
            'meta.page_template' => ['required', Rule::in(\PageTemplates::listBackend('product'))],

            'meta.sliders.*' => ['nullable', 'array'],
            'meta.sliders.*.url' => ['required', 'string', 'url', new FileUploadPath(AvailableUploadPaths::IMAGES_PRODUCTS_SLIDERS->value)],

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

    public function attributes()
    {
        return [
            'meta.sliders.*.url' => 'url slider'
        ];
    }
}