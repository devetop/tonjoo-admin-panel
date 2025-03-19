<?php

namespace App\Api\Services;

use Illuminate\Support\Str;
use App\Api\Contracts\PostInterface;
use App\Api\Contracts\PageTemplatesInterface;

class PageTemplatesService implements PageTemplatesInterface
{
    protected $postApi;

    public function __construct(PostInterface $postApi)
    {
        $this->postApi = $postApi;
    }

    public function listBackend(string $postType, $default = [])
    {
        return config()->get('cms.frontend.page-templates.' . $postType, $default);
    }

    public function getFrontendReact($post)
    {
        $postType = Str::studly($post->type);

        if ($template = $this->postApi->getMeta($post, 'page_template')) {
            $templateJsx = Str::studly($template);
            $templateIsExist = \Storage::disk('frontend_react')->exists("$postType/Template/$templateJsx.jsx");

            if ($templateIsExist) {
                return "$postType/Template/$templateJsx";
            }
        }

        //fallback to single view
        return "$postType/Single";
    }

    public function getFrontendPostTypeReact($postType)
    {
        $postType = Str::studly($postType);
        $postTypeTemplateIsExist = \Storage::disk('frontend_react')->exists("$postType/Archive.jsx");

        if ($postTypeTemplateIsExist) {
            return "$postType/Archive";
        }

        //fallback to single view
        return "Post/Archive";
    }
}
