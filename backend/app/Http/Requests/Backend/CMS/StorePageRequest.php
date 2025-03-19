<?php

namespace App\Http\Requests\Backend\CMS;

use App\Http\Enums\PostStatus;
use App\Rules\PostTermRule;
use App\Rules\SlugRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePageRequest extends FormRequest
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
            'meta.page_template' => ['required', Rule::in(\PageTemplates::listBackend('page'))],
        ];

        $this->aboutUsRules($rules);

        // meta page-template slider-gallery
        if (request()->input('meta.page_template') == 'slider-gallery') {
            $rules['meta.slider_content.*.title'] = ['required', 'string'];
            $rules['meta.slider_content.*.image_desktop'] = ['required', 'file', 'image', 'max:2000'];
            $rules['meta.slider_content.*.image_desktop_url'] = ['nullable', 'string'];
            $rules['meta.slider_content.*.image_mobile'] = ['required', 'file', 'image', 'max:2000'];
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

    protected function aboutUsRules(&$rules, $state = 'create')
    {
        // meta page-template about-us
        if (request()->input('meta.page_template') == 'about-us') {
            // # core values
            $rules['meta.about_us.section1.header.title'] = ['required', 'string'];
            $rules['meta.about_us.section1.header.subtitle'] = ['required', 'string'];
            $rules['meta.about_us.section1.cards.0.image_file'] = ['required', 'file'];
            $rules['meta.about_us.section1.cards.*.image_file'] = ['required', 'file'];
            $rules['meta.about_us.section1.cards.0.title'] = ['required', 'string'];
            $rules['meta.about_us.section1.cards.*.title'] = ['required', 'string'];
            $rules['meta.about_us.section1.cards.0.description'] = ['required', 'string'];
            $rules['meta.about_us.section1.cards.*.description'] = ['required', 'string'];

            // # our teams
            $rules['meta.about_us.section2.header.title'] = ['required', 'string'];
            $rules['meta.about_us.section2.header.subtitle'] = ['required', 'string'];
            $rules['meta.about_us.section2.cards.0.image_file'] = ['required', 'file'];
            $rules['meta.about_us.section2.cards.*.image_file'] = ['required', 'file'];
            $rules['meta.about_us.section2.cards.0.name'] = ['required', 'string'];
            $rules['meta.about_us.section2.cards.*.name'] = ['required', 'string'];
            $rules['meta.about_us.section2.cards.0.job_title'] = ['required', 'string'];
            $rules['meta.about_us.section2.cards.*.job_title'] = ['required', 'string'];
            $rules['meta.about_us.section2.cards.0.social_fb'] = ['required', 'string'];
            $rules['meta.about_us.section2.cards.*.social_fb'] = ['required', 'string'];
            $rules['meta.about_us.section2.cards.0.social_x'] = ['required', 'string'];
            $rules['meta.about_us.section2.cards.*.social_x'] = ['required', 'string'];
            $rules['meta.about_us.section2.cards.0.social_in'] = ['required', 'string'];
            $rules['meta.about_us.section2.cards.*.social_in'] = ['required', 'string'];

            // # theme
            $rules['meta.about_us.section3.header.title'] = ['required', 'string'];
            $rules['meta.about_us.section3.header.subtitle'] = ['required', 'string'];
            $rules['meta.about_us.section3.cards.0.image_file'] = ['required', 'file'];
            $rules['meta.about_us.section3.cards.*.image_file'] = ['required', 'file'];
            $rules['meta.about_us.section3.cards.0.title'] = ['required', 'string'];
            $rules['meta.about_us.section3.cards.*.title'] = ['required', 'string'];
            $rules['meta.about_us.section3.cards.0.content'] = ['required', 'string'];
            $rules['meta.about_us.section3.cards.*.content'] = ['required', 'string'];
        }

        if ($state == 'update') {
            // # core values
            $rules['meta.about_us.section1.cards.0.image_file'] = ['nullable'];
            $rules['meta.about_us.section1.cards.*.image_file'] = ['nullable'];
            // # our teams
            $rules['meta.about_us.section2.cards.0.image_file'] = ['nullable'];
            $rules['meta.about_us.section2.cards.*.image_file'] = ['nullable'];
            // # theme
            $rules['meta.about_us.section3.cards.0.image_file'] = ['nullable'];
            $rules['meta.about_us.section3.cards.*.image_file'] = ['nullable'];
        }
    }

    public function attributes()
    {
        return [
            // # core values
            'meta.about_us.section1.header.title' => 'core values title',
            'meta.about_us.section1.header.subtitle' => 'core values subtitle',
            'meta.about_us.section1.cards.0.image_title' => 'core values image title',
            'meta.about_us.section1.cards.*.image_title' => 'core values image title',
            'meta.about_us.section1.cards.0.title' => 'core values title',
            'meta.about_us.section1.cards.*.title' => 'core values title',
            'meta.about_us.section1.cards.0.description' => 'core values description',
            'meta.about_us.section1.cards.*.description' => 'core values description',

            // # our teams
            'meta.about_us.section2.header.title' => 'our teams title',
            'meta.about_us.section2.header.subtitle' => 'our teams subtitle',
            'meta.about_us.section2.cards.0.name' => 'team name',
            'meta.about_us.section2.cards.*.name' => 'team name',
            'meta.about_us.section2.cards.0.job_title' => 'team job title',
            'meta.about_us.section2.cards.*.job_title' => 'team job title',
            'meta.about_us.section2.cards.0.social_fb' => 'team facebook',
            'meta.about_us.section2.cards.*.social_fb' => 'team facebook',
            'meta.about_us.section2.cards.0.social_x' => 'team twitter',
            'meta.about_us.section2.cards.*.social_x' => 'team twitter',
            'meta.about_us.section2.cards.0.social_in' => 'team linkedin',
            'meta.about_us.section2.cards.*.social_in' => 'team linkedin',

            // # theme
            'meta.about_us.section3.header.title' => 'theme title',
            'meta.about_us.section3.header.subtitle' => 'theme subtitle',
            'meta.about_us.section3.cards.0.image_file' => 'theme icon',
            'meta.about_us.section3.cards.*.image_file' => 'theme icon',
            'meta.about_us.section3.cards.0.title' => 'theme title',
            'meta.about_us.section3.cards.*.title' => 'theme title',
            'meta.about_us.section3.cards.0.content' => 'theme content',
            'meta.about_us.section3.cards.*.content' => 'theme content',
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