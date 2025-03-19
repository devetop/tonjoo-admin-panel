<?php

namespace App\Http\Requests\Backend\CMS;
use App\Http\Enums\PostStatus;
use App\Rules\SlugRule;
use Illuminate\Validation\Rule;

class UpdatePageRequest extends StorePageRequest
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
            'content' => ['nullable', 'string'],
            'status' => ['required', Rule::in(PostStatus::allValues())],

            'meta.sub_title' => ['nullable', 'string'],
            'meta.meta_title' => ['nullable', 'string'],
            'meta.meta_description' => ['nullable', 'string'],
            'meta.featured_image' => ['nullable', 'file', 'image', 'max:2000'],
            'meta.page_template' => ['required', Rule::in(\PageTemplates::listBackend('page'))],
        ];

        $this->aboutUsRules($rules, 'update');

        // meta page-template slider-gallery
        if (request()->input('meta.page_template') == 'slider-gallery') {
            // if ($this->hasFile('meta.slider_content.*.image_desktop')) {
            //     $rules['meta.slider_content.*.image_desktop'] = ['file', 'image', 'max:2000'];
            // }
            // if ($this->hasFile('meta.slider_content.*.image_mobile')) {
            //     $rules['meta.slider_content.*.image_mobile'] = ['file', 'image', 'max:2000'];
            // }
            $rules['meta.slider_content.*.title'] = ['required', 'string'];
            $rules['meta.slider_content.*.image_desktop_url'] = ['nullable', 'string'];
            $rules['meta.slider_content.*.image_mobile_url'] = ['nullable', 'string'];
        }
        // meta page-template page-with-additional-info
        if (request()->input('meta.page_template') == 'page-with-additional-info') {
            $rules['meta.additional_info'] = ['nullable', 'string'];
        }
        // meta page-template list-post
        if (request()->input('meta.page_template') == 'list-post') {
            $rules['meta.list_post.*.post_id'] = ['required', 'exists:posts.id'];
        }
        // meta page-template contact-form
        // meta page-template content-html
        if (request()->input('meta.page_template') == 'list-post') {
            $rules['meta.list_post.*.content_html'] = ['nullable', 'string'];
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