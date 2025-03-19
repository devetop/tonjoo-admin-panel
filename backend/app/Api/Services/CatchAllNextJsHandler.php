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
class CatchAllNextJsHandler implements CatchAllInterface
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
        $post = $this->postApi->singleAny($path, config('cms.frontend.routing.catch-all'));

        if (!$post) {
            // konten tidak termasuk dalam catch-all
            $post = $this->postApi->singleAny($path, $this->getCatchables());
            if ($post) {
                return response()->json([
                    'message' => 'content moved',
                    'success' => false,
                    'destination' => \Routing::getPermalink($post),
                ])->setStatusCode(301);
            }

            // konten tidak ditemukan
            return response()->json([
                'message' => 'not found',
                'success' => false
            ])->setStatusCode(404);
        }

        $post->append(['featuredImage', 'subTitle']);
        $post->load('author:id,name,email', 'post_metas:post_id,key,value,is_serialized', 'terms');

        $post->post_metas = $post->post_metas->map(function($item) {
            if ($item->is_serialized) {
                $item->value = unserialize($item->value);
            }
            return $item;
        });

        return response()->json([
            'success' => true,
            'data'=> $post
        ]);
    }

    private function getCatchables()
    {
        return array_diff(config('cms.frontend.routing.post-types'), config('cms.frontend.routing.catch-all'));

    }
}
