<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Term;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Api\Contracts\PostInterface;
use App\Api\Contracts\RoutingInterface;
use App\Api\Contracts\PageTemplatesInterface;

class PostController extends Controller
{
    protected $postApi;
    protected $routingApi;
    protected $pageTemplate;

    public function __construct(
        PostInterface $postApi,
        RoutingInterface $routingApi,
        PageTemplatesInterface $pageTemplate
    ){
        $this->postApi      = $postApi;
        $this->routingApi   = $routingApi;
        $this->pageTemplate = $pageTemplate;
    }

    public function single($slug)
    {
        $post_type = $this->routingApi->getCurrentPostType();
        $post = $this->postApi->singleAny($slug, $post_type);

        if (!$post) abort(404);

        // refirect to permalink
        if (\URL::current() != $this->routingApi->getPermalink($post)) {
            return redirect()->to($this->routingApi->getPermalink($post));
        }

        $reactComponent = $this->pageTemplate->getFrontendReact($post);

        Inertia::setRootView('frontend.layouts.inertia');

        $post->append(['featuredImage', 'subTitle']);
        $post->load('author');

        return Inertia::render($reactComponent, [
            'post' => $post,
            'post_type' => $post_type
        ]);
    }

    public function list(Request $request)
    {
        $post_type = $this->routingApi->getCurrentPostType();
        
        $posts = $this->postApi->frontendList($request, $post_type);
        $posts->append(['featuredImage', 'subTitle']);
        $posts->load('author');

        $reactComponent = $this->pageTemplate->getFrontendPostTypeReact($post_type);

        Inertia::setRootView('frontend.layouts.inertia');

        $categories = Term::select('terms.*')->whereHas('taxonomy', function($query) use($post_type) {
            $query->where('name', $post_type.'_category');
        })->limit(4)->orderBy('id', 'asc')->get();
        $tags = Term::select('terms.*')->whereHas('taxonomy', function($query) use($post_type) {
            $query->where('name', $post_type.'_tag');
        })->orderBy('name', 'asc')->get();

        return Inertia::render($reactComponent, [
            'posts' => $posts,
            'post_type' => $post_type,
            'categories' => $categories,
            'tags' => $tags,
        ]);
    }
}
