<?php

namespace App\Http\Controllers\FrontendDashboardApi\CMS;

use App\Api\Services\PostProductEloquent;
use App\Http\Controllers\Controller;
use App\Http\Enums\PostStatus;
use App\Http\Requests\Backend\CMS\StoreProductRequest;
use App\Models\Post;
use App\Models\Term;
use App\Models\User;
use App\Rules\SlugRule;
use Illuminate\Http\Request;

class ProductMineController extends Controller
{
    public function __construct(
        private PostProductEloquent $postService,
        private Post $post,
    ) { }
    
    public function index(Request $request)
    {
        context_authorize('dashboard', 'product-can-view-mine');
        
        $products = $this->postService
            ->setSearchableFields('title')
            ->setWith('author', 'terms.taxonomy')
            ->listMine()
            ->appends($request->all())
            ->withPath('');

        $products->getCollection()->transform(function($item) {
            $item->category = collect($item->terms)
                ->filter(fn ($item) => $item->taxonomy->name === 'product_category')
                ->map(fn ($item) => $item->name)
                ->join(',');
            $item->tag = collect($item->terms)
                ->filter(fn ($item) => $item->taxonomy->name === 'product_tag')
                ->map(fn ($item) => $item->name)
                ->join(',');
            $item->author_name = $item->author->name;
            unset($item->terms, $item->author);
            return $item;
        });

        return response()->json([
            'data' => $products
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        context_authorize('dashboard', 'product-can-create-mine');

        $request->merge([
            'author_id' => auth()->id()
        ]);

        $post = $this->postService->storePostWithMeta(
            [
                'type' => 'product',
                ...$request->only('title', 'slug', 'content', 'author_id', 'status'),
            ],
            $request->meta,
            $request->term
        );

        return response()->json([
            'success' => true,
            'data' => $post,
            'message' => 'Product successfully created.',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        context_authorize('dashboard', ['product-can-show-mine' => [$id]]);

        $post = $this->post->findOrFail($id);
        $product = [
            "id" => $id,
            "title" => $post->title,
            "slug" => $post->slug,
            "content" => $post->content,
            "status" => $post->status,
            "author_id" => $post->author_id,
            "meta" => [
                "sub_title" => $this->postService->getMeta($post, 'sub_title'),
                "meta_title" => $this->postService->getMeta($post, 'meta_title'),
                "meta_description" => $this->postService->getMeta($post, 'meta_description'),
                "page_template" => $this->postService->getMeta($post, 'page_template') ?? 'default',
            ],
            "term" => [
                "product_category" => $post->terms->filter(fn($term) => $term->taxonomy->name === 'product_category')->pluck('id')->toArray(),
                "product_tag" => $post->terms->filter(fn($term) => $term->taxonomy->name === 'product_tag')->pluck('id')->toArray(),
            ],
            // tidak masuk formData
            "etc" => [
                "id" => $post->id,
                'featured_image' => $post->featured_image,
                'permalink' => \Routing::getPermalink($post)
            ]
        ];

        return response()->json([
            'success' => true,
            'data' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {  
        context_authorize('dashboard', ['product-can-update-mine' => [$id]]);

        $product = $this->postService->updatePostWithMeta(
            $id,
            [
                'type' => 'product',
                ...$request->only('title', 'slug', 'content', 'author_id', 'status'),
            ],
            $request->meta,
            $request->term
        );

        if ($product) {
            return response()->json([
                'success' => true,
                'message' => 'Product successfully updated.',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Failed updatep product.',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        context_authorize('dashboard', ['product-can-delete-mine' => [$id]]);

        if ($this->postService->deletePost($id)) {
            return response()->json([
                'success' => true,
                'message' => 'Product successfully deleted. ' . ((string) $id),
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Failed delete product.',
            ]);
        }
    }
}
