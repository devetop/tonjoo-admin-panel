<?php

namespace App\Http\Controllers\Backend\CMS;

use App\Api\Contracts\TermInterface;
use App\Models\Post;
use App\Models\Term;
use App\Models\User;
use App\Rules\SlugRule;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Requests\Backend\CMS\StorePostRequest;
use App\Http\Requests\Backend\CMS\UpdatePostRequest;

use App\Api\Contracts\PostInterface;
use Inertia\Inertia;

class PostController extends Controller
{
    private $authorize;

    public function __construct(
        private PostInterface $postApi,
        private TermInterface $termApi,
    ) {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     * @return \Inertia\Response
     */
    public function index(Request $request)
    {
        authorize('list-post');

        $order = ($request->sortBy && $request->orderBy) ?
            [
                $request->sortBy => $request->orderBy
            ] : [
                'posts.created_at' => 'DESC'
            ];

        $filters = [
            'search' => $request->search,
            'column' => [
                'status' => ($request->status && $request->status !== 'all') ? $request->status : ''
            ],
            'relation' => [
                [
                    ['author', 'name', $request->author]
                ],
                [
                    ['terms', 'name', $request->tag],
                    ['terms.taxonomy', 'name', 'post_tag']
                ],
                [
                    ['terms', 'name', $request->category],
                    ['terms.taxonomy', 'name', 'post_category']
                ]
            ],
        ];

        $posts = $this->postApi
            ->setSearchableFields('title')
            ->setWith('author', 'terms.taxonomy')
            ->list(
                'post',
                $filters,
                $order,
                $request->perPage ?? 10
            )
            ->appends($request->all());

        $filters = [
            'authors' => User::select('users.name')->get()->map(fn($u) => $u->name),
            'tags' => app(Term::class)->select('terms.name')->whereRelation('taxonomy', 'name', 'post_tag')->get()->map(fn($t) => $t->name),
            'categories' => app(Term::class)->select('terms.name')->whereRelation('taxonomy', 'name', 'post_category')->get()->map(fn($t) => $t->name),
        ];

        return Inertia::render('Post/Index', compact('posts', 'filters'));
    }

    public function create()
    {
        authorize('add-post');

        $users = User::get();
        $templates = \PageTemplates::listBackend('post');
        $taxonomies = $this->termApi->getByPostType('post');

        return Inertia::render('Post/Create', compact('users', 'templates', 'taxonomies'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  \App\Http\Requests\Backend\StorePostRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StorePostRequest $request)
    {
        authorize('add-post');

        $post = $this->postApi->storePostWithMeta(
            [
                'type' => 'post',
                'title' => $request->title,
                'slug' => $request->slug,
                'content' => $request->content,
                'author_id' => $request->author_id,
                'status' => $request->status,
            ],
            $request->meta,
            $request->term
        );

        if ($post) {
            return to_route('cms.post.edit', $post->id)
                ->with('success', 'Post successfully created.');
        } else {
            return to_route('cms.post')
                ->with('error', 'Failed create Post.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return \Inertia\Response
     */
    public function edit($id)
    {
        authorize('edit-post');
        $post = Post::findOrFail($id);
        $post = [
            "title" => $post->title,
            "slug" => $post->slug,
            "content" => $post->content,
            "status" => $post->status,
            "author_id" => $post->author_id,
            "meta" => [
                "sub_title" => $this->postApi->getMeta($post, 'sub_title'),
                "meta_title" => $this->postApi->getMeta($post, 'meta_title'),
                "meta_description" => $this->postApi->getMeta($post, 'meta_description'),
                "page_template" => $this->postApi->getMeta($post, 'page_template'),
                // meta template post-with-slider
                "slider_content" => $this->postApi->getMeta($post, 'meta_slider'),
                // meta template news-page
                "release_date" => $this->postApi->getMeta($post, 'release_date'),
            ],
            "term" => [
                "post_category" => $post->terms->filter(fn($term) => $term->taxonomy->name === 'post_category')->pluck('id')->toArray(),
                "post_tag" => $post->terms->filter(fn($term) => $term->taxonomy->name === 'post_tag')->pluck('id')->toArray(),
            ],
            // tidak masuk formData
            "id" => $post->id,
            'featured_image' => $post->featured_image,
            'permalink' => \Routing::getPermalink($post)
        ];

        $users = User::get();
        $templates = \PageTemplates::listBackend('post');
        $taxonomies = $this->termApi->getByPostType('post');

        return Inertia::render('Post/Edit', compact('users', 'templates', 'taxonomies', 'post'));
    }


    /**
     * Update the specified resource in storage.
     * @param UpdatePostRequest $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdatePostRequest $request, $postId)
    {
        authorize('edit-post');

        $post = $this->postApi->updatePostWithMeta(
            $postId,
            [
                'type' => 'post',
                'title' => $request->title,
                'slug' => $request->slug,
                'content' => $request->content,
                'author_id' => $request->author_id,
                'status' => $request->status,
            ],
            $request->meta,
            $request->term
        );

        if ($post) {
            return to_route('cms.post.edit', $postId)
                ->with('success', 'Data successfully updated.');
        } else {
            return to_route('cms.post.edit', $postId)
                ->with('error', 'Failed update data.');
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        authorize('delete-post');

        if ($this->postApi->deletePost($id)) {
            return to_route('cms.post')
                ->with('success', 'Content successfully deleted.');
        } else {
            return to_route('cms.post')
                ->with('error', 'Failed delete data.');
        }
    }

    /**
     * Semua post type akan memvalidasi slugnya di sini
     */
    public function slugValidation(Request $request)
    {
        $except = $request->id ? ',' . $request->id : '';

        $validator = \Validator::make($request->all(), [
            'slug' => ['unique:posts,slug' . $except, new SlugRule],
        ]);
        
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->first()]);
        } else {
            return response()->json(['status' => 'ok']);
        }
    }
}