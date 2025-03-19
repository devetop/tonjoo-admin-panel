<?php

namespace App\Http\Requests\Backend\CMS;

use App\Http\Enums\PostStatus;
use App\Rules\PostTermRule;
use App\Rules\SlugRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePostRequest extends FormRequest
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
            'meta.featured_image' => ['nullable', 'file', 'image', 'max:2000'],
            'meta.page_template' => ['required', Rule::in(\PageTemplates::listBackend('post'))],

            'term.post_category' => ['nullable', (new PostTermRule('post_category'))],
            'term.post_tag' => ['nullable', (new PostTermRule('post_tag'))],
        ];

        // custom meta berdasarkan post-template
        if (request()->input('meta.page_template') == 'news-page') {
            $rules['meta.release_date'] = ['required', 'date'];
        }
        if (request()->input('meta.page_template') == 'post-with-slider') {
            $rules['meta.slider_content[].*'] = ['required', 'string'];
        }

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