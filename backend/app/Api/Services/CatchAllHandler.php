<?php

namespace App\Api\Services;

use App\Api\Contracts\CatchAllInterface;
use App\Api\Contracts\PostInterface;
use App\Api\Contracts\PageTemplatesInterface;
use App\Api\Contracts\RoutingInterface;

use Illuminate\Http\Request;
use Inertia\Inertia;

/**
 * Handler catch all
 *
 * untuk handle any route dengan /{catch_all}
 * parameter catch_all bisa berupa slug, atau url komplit yang tidak terdaftar
 * di routes/web.php, selain 'cms' dan 'admin'
 *
 * Default behavior
 * - slug catch all (tanpa subpath) didefinisikan di config/frontend.php
 * - jika catch all mendeteksi post type non catch all otomatis redirect
 */
class CatchAllHandler implements CatchAllInterface
{
    protected $postApi;
    protected $pageTemplate;
    protected $routing;

    public function __construct(
        PostInterface $postApi,
        PageTemplatesInterface $pageTemplate,
        RoutingInterface $routing
    ){
        $this->postApi      = $postApi;
        $this->pageTemplate = $pageTemplate;
        $this->routing      = $routing;
    }

    public function handle($path, Request $request)
    {
        //default: single page
        $post = $this->postApi->singleAny($path, config('cms.frontend.routing.catch-all'));

        if ($post) {
            $reactComponent = $this->pageTemplate->getFrontendReact($post);
            if($reactComponent !== 'Page/Single') {
                Inertia::setRootView('frontend.layouts.inertia');
                return Inertia::render($reactComponent);
            }

            // if ($post->type == 'page' && 1) {
            //     return Inertia::render('')
            // }
            
            // check permalink
            if (\URL::current() != $this->routing->getPermalink($post)) {
                return redirect()->to($this->routing->getPermalink($post));
            }

            $post_type = $post->type;
            $viewName = $this->pageTemplate->getFrontendView($post);
            return view($viewName, compact('post', 'post_type'));
        }

        //any {post type}, redirect to {post type} page
        $post = $this->postApi->singleAny($path, $this->getCatchables());
        if ($post) {
            return redirect()->to($this->routing->getPermalink($post));
        }

        abort(404);
    }

    private function getCatchables()
    {
        // hanya handle non-catch-all
        return array_diff(config('cms.frontend.routing.post-types'), config('cms.frontend.routing.catch-all'));

    }
}
