<?php

namespace App\Http\Controllers\Backend\CMS;

use App\Api\Contracts\ImageStorageInterface;
use App\Api\Contracts\TermInterface;
use App\Http\Requests\Backend\CMS\StorePageRequest;
use App\Http\Requests\Backend\CMS\UpdatePageRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use App\Api\Contracts\PostInterface;
use Inertia\Inertia;

class PageController extends Controller
{
    private $authorize;

    public function __construct(
        private PostInterface $postApi,
        private TermInterface $termApi,
        private ImageStorageInterface $imageStorage,
    ) {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     * @return \Inertia\Response
     */
    public function index(Request $request)
    {
        authorize('list-page');

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
            ],
        ];

        $posts = $this->postApi
            ->setSearchableFields('title')
            ->setWith('author')
            ->list(
                'page',
                $filters,
                $order,
                $request->perPage ?? 10
            )
            ->appends($request->all());

        $filters = [
            'authors' => User::select('users.name')->get()->map(fn($u) => $u->name),
        ];

        return Inertia::render('Page/Index', compact('posts', 'filters'));
    }

    public function create()
    {
        authorize('add-page');

        $users = User::get();
        $templates = \PageTemplates::listBackend('page');
        $posts = Post::select(['id', 'title'])->get();

        return Inertia::render('Page/Create', compact('users', 'templates', 'posts'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  StorePageRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StorePageRequest $request)
    {
        authorize('add-page');

        $post = $this->postApi->storePostWithMeta(
            [
                'type' => 'page',
                'title' => $request->title,
                'slug' => $request->slug,
                'content' => $request->content,
                'author_id' => $request->author_id,
                'status' => $request->status,
            ],
            $this->metaSerialize($request->meta),
            $request->term
        );

        if ($post) {
            return to_route('cms.page.edit', $post->id)
                ->with('success', 'Post successfully created.');
        } else {
            return back()->with('error', 'Failed create Post.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return \Inertia\Response
     */
    public function edit($id)
    {
        authorize('edit-page');
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
                // meta page-template slider-gallery
                "slider_content" => $this->postApi->getMeta($post, "slider_content"),
                // meta page-template page-with-additional-info
                "additional_info" => $this->postApi->getMeta($post, "additional_info"),
                // meta page-template list-post
                "list_post" => $this->postApi->getMeta($post, "list_post"),
                // meta page-template contact-form
                "contact_form" => $this->postApi->getMeta($post, "contact_form"),
                // meta page-template content-html
                "content_html" => $this->postApi->getMeta($post, "content_html"),
                // meta page-template about-us
                "about_us" => $this->postApi->getMeta($post, "about_us"),
            ],
            // tidak masuk formData
            "id" => $post->id,
            'featured_image' => $post->featured_image,
            'permalink' => \Routing::getPermalink($post)
        ];

        $users = User::get();
        $templates = \PageTemplates::listBackend('page');
        $posts = Post::select(['id', 'title'])->get();

        return Inertia::render('Page/Edit', compact('users', 'templates', 'post', 'posts'));
    }


    /**
     * Update the specified resource in storage.
     * @param UpdatePageRequest $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdatePageRequest $request, $postId)
    {
        authorize('edit-page');

        $post = $this->postApi->updatePostWithMeta(
            $postId,
            [
                'type' => 'page',
                'title' => $request->title,
                'slug' => $request->slug,
                'content' => $request->content,
                'author_id' => $request->author_id,
                'status' => $request->status,
            ],
            $this->metaSerialize($request->meta),
        );

        if ($post) {
            return to_route('cms.page.edit', $postId)
                ->with('success', 'Page successfully updated.');
        } else {
            return to_route('cms.page.edit', $postId)
                ->with('error', 'Failed update Page.');
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        authorize('delete-page');

        if ($this->postApi->deletePost($id)) {
            return to_route('cms.page')
                ->with('success', 'Page successfully deleted.');
        } else {
            return to_route('cms.page')
                ->with('error', 'Failed delete Page.');
        }
    }

    private function metaSerialize($metas) {
        if( $metas['page_template'] === 'slider-gallery' ) {
            foreach ($metas['slider_content'] as &$meta) {
                
                if ($meta['image_desktop'] && $meta['image_desktop'] instanceof \Illuminate\Http\UploadedFile) {
                    $meta['image_desktop'] = $this->imageStorage->uploadImage($meta['image_desktop'], [], 'page/', TRUE);
                    $meta['image_desktop_url'] = \ImageStorage::getUrl('page/', $meta['image_desktop']);
                } else if (is_string($meta['image_desktop'])) {
                    $meta['image_desktop_url'] = \ImageStorage::getUrl('page/', $meta['image_desktop']);
                } else {
                    $meta['image_desktop_url'] = asset('assets/frontend/assets/img/post-bg.jpg');
                }
                
                if ($meta['image_mobile'] && $meta['image_mobile'] instanceof \Illuminate\Http\UploadedFile) {
                    $meta['image_mobile'] = $this->imageStorage->uploadImage($meta['image_mobile'], [], 'page/', TRUE);
                    $meta['image_mobile_url'] = \ImageStorage::getUrl('page/', $meta['image_mobile']);
                } else if (is_string($meta['image_mobile'])) {
                    $meta['image_mobile_url'] = \ImageStorage::getUrl('page/', $meta['image_mobile']);
                } else {
                    $meta['image_mobile_url'] = asset('assets/frontend/assets/img/post-bg.jpg');
                }
            }
        }

        if ( $metas['page_template'] === 'about-us' ) {
            for ($i=1; $i <= 3; $i++) { 
                foreach ($metas['about_us']['section' . (string) $i]['cards'] as &$meta) {
                    if (!($meta['image_file'] instanceof \Illuminate\Http\UploadedFile)) continue;
    
                    if (isset($meta['image_filename'])) {
                        $imagepath = storage_path('app/public/page/' . $meta['image_filename']);
                        if (file_exists($imagepath)) {
                            unlink($imagepath);
                        }
                    }
    
                    $meta['image_filename'] = $this->imageStorage->uploadImage($meta['image_file'], [], 'page/', TRUE);
                    $meta['image_url'] = \ImageStorage::getUrl('page/', $meta['image_filename']);
                    $meta['image_file'] = '';
                }
            }
        }

        return $metas;
    }
}