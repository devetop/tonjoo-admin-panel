<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use App\Api\Contracts\OptionInterface;
use App\Api\Contracts\PageTemplatesInterface;
use App\Api\Contracts\PostInterface;
use Inertia\Inertia;

/**
 * handler route home (root)
 *
 * bisa dilakukan konfigurasi di sini bisa single page atau list post
 * untuk saat ini default dengan list post
 */
class HomeController extends Controller
{
    private $optionApi;
    private $postApi;
    private $pageTemplatesApi;

    public function __construct(
        OptionInterface $optionApi,
        PostInterface $postApi,
        PageTemplatesInterface $pageTemplatesApi
    ){
        $this->optionApi        = $optionApi;
        $this->postApi          = $postApi;
        $this->pageTemplatesApi = $pageTemplatesApi;
    }

    public function index(Request $request)
    {
        Inertia::setRootView('frontend.layouts.inertia');

        $posts = \Post::list();

        $posts->append(['featuredImage', 'subTitle']);
        $posts->load(['author']);

        return Inertia::render('Home', [
            'posts' => $posts
        ]);
    }

}
