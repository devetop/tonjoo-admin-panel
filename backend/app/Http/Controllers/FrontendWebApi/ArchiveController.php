<?php

namespace App\Http\Controllers\FrontendWebApi;

use App\Api\Contracts\PageTemplatesInterface;
use App\Api\Contracts\PostInterface;
use App\Api\Contracts\RoutingInterface;
use App\Http\Controllers\Controller;
use App\Models\Term;
use App\Models\User;
use Illuminate\Http\Request;

class ArchiveController extends Controller
{
    public function __construct(
        private PostInterface $postApi,
        private RoutingInterface $routingApi,
        private PageTemplatesInterface $pageTemplate,
        private User $userModel,
    ){ }

    public function index(Request $request, $post_type)
    {
        $posts = $this->postApi->frontendList($request, $post_type);
        $posts->append(['featuredImage', 'subTitle']);
        $posts->load('author:id,email,name');

        $categories = Term::select('terms.*')->whereHas('taxonomy', function($query) use($post_type) {
            $query->where('name', $post_type.'_category');
        })->limit(4)->orderBy('id', 'asc')->get();
        $tags = Term::select('terms.*')->whereHas('taxonomy', function($query) use($post_type) {
            $query->where('name', $post_type.'_tag');
        })->orderBy('name', 'asc')->get();

        return [
            'data' => [
                'posts' => $posts,
                'categories' => $categories,
                'tags' => $tags,
            ]
        ];
    }

    public function single(Request $request, $post_type, $slug)
    {
        $post = $this->postApi->singleAny($slug, $post_type);
        if (!$post) abort(404);

        $post->tags = $this->postApi->getTerms($post, $post_type.'_tag');
        $post->categories = $this->postApi->getTerms($post, $post_type.'_category');
        $post->append(['featuredImage', 'subTitle']);
        $post->load('author:id,email,name');

        if ($post->post_metas->count() > 0) {
            $post->post_metas = $post->post_metas->map(function($meta) {
                if ($meta->is_serialized) {
                    $meta->value = unserialize($meta->value);
                }
                return $meta;
            });
        }

        return [
            'data' => $post,
        ];
    }

    public function author(Request $request, $name)
    {
        $user = $this->userModel->where('name', $name)->firstOrFail();
        $user->avatar = $user?->name ? $user->getAvatar() : '#';

        $posts = $this->postApi->getByUserId($request, $user->id);
        $posts->append(['featuredImage', 'subTitle']);
        $posts->load('author:id,email,name');

        return [
            'data' => [
                'author' => $user,
                'posts' => $posts,
            ]
        ];
    }
}
