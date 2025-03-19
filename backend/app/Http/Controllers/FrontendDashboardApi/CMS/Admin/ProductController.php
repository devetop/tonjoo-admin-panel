<?php

namespace App\Http\Controllers\FrontendDashboardApi\CMS\Admin;

use App\Api\Services\PostProductEloquent;
use App\Http\Controllers\Controller;
use App\Http\Enums\PostStatus;
use App\Http\Requests\Backend\CMS\StoreProductRequest;
use App\Http\Requests\Backend\CMS\UpdateProductRequest;
use App\Models\Post;
use App\Models\Term;
use App\Models\User;
use App\Rules\SlugRule;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(
        private PostProductEloquent $postService,
        private Post $post,
    ) { }
    
    public function index(Request $request)
    {
        if (has_context_capability('dashboard', 'list-all-products')) {
            $products = $this->postService
                ->setSearchableFields('title')
                ->setWith('author', 'terms.taxonomy')
                ->listAll()
                ->appends($request->all())
                ->withPath('');
        } else {
            $products = $this->postService
                ->setSearchableFields('title')
                ->setWith('author', 'terms.taxonomy')
                ->listMine()
                ->appends($request->all())
                ->withPath('');
        }

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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        context_authorize('dashboard', 'create-product-to-spesific-user');
        return response()->json([
            'data' => [
                'status' => PostStatus::selectItems(),
                'author' => User::all(['name', 'id'])->pluck('name', 'id'),
                'templates' => array_combine(\PageTemplates::listBackend('product'), \PageTemplates::listBackend('product')),
                'tags' => app(Term::class)->whereRelation('taxonomy', 'name', 'product_tag')->pluck('terms.name', 'terms.id'),
                'categories' => app(Term::class)->whereRelation('taxonomy', 'name', 'product_category')->pluck('terms.name', 'terms.id'),
            ]
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
        try {
            if (!has_context_capability('dashboard', 'create-product-to-spesific-user')) {
                if ($request->filled('author_id')) {
                    throw new \Exception("You dont have create-product-to-spesific-user permission", 403);
                }

                $request->merge([
                    'author_id' => auth()->id()
                ]);
            }
    
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
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage() ?? 'Failed create product.',
            ], $th->getCode() ?? 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        context_authorize('dashboard', 'update-all-products');

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
                "featured_image_url" => $this->postService->getMeta($post, 'featured_image_url') ?? config('app.frontend_dashboard_base_url') . '/assets/images/default-image.png',
                "sliders" => $this->postService->getMeta($post, 'sliders'),
            ],
            "term" => [
                "product_category" => $post->terms->filter(fn($term) => $term->taxonomy->name === 'product_category')->pluck('id')->toArray(),
                "product_tag" => $post->terms->filter(fn($term) => $term->taxonomy->name === 'product_tag')->pluck('id')->toArray(),
            ],
            // tidak masuk formData
            "etc" => [
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
    public function update(UpdateProductRequest $request, $id)
    {  
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
                'message' => 'Failed update product.',
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
        context_authorize('dashboard', 'delete-all-products');

        if ($this->postService->deletePost($id)) {
            return response()->json([
                'success' => true,
                'message' => 'Product successfully deleted. ',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Failed delete product.',
            ], 400);
        }
    }

    public function slugValidation(Request $request)
    {
        $except = $request->id ? ",$request->id" : '';

        $validator = \Validator::make($request->all(), [
            'slug' => ['unique:posts,slug' . $except, new SlugRule],
        ]);
        
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'error' => $validator->errors()->first(),
            ]);
        } else {
            return response()->json([
                'status' => true,
            ]);
        }
    }

    public function filter()
    {
        return response()->json([
            'data' => [
                'authors' => app(User::class)->pluck('users.name', 'users.id'),
                'tags' => app(Term::class)->whereRelation('taxonomy', 'name', 'product_tag')->pluck('terms.name', 'terms.id'),
                'categories' => app(Term::class)->whereRelation('taxonomy', 'name', 'product_category')->pluck('terms.name', 'terms.id'),
            ]    
        ]);
    }
}
