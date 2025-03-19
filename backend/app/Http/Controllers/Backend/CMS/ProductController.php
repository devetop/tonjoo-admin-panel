<?php

namespace App\Http\Controllers\Backend\CMS;

use App\Api\Contracts\TermInterface;
use App\Models\Post;
use App\Models\Term;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Requests\Backend\CMS\StoreProductRequest;
use App\Http\Requests\Backend\CMS\UpdateProductRequest;

use App\Api\Contracts\PostInterface;
use Inertia\Inertia;

class ProductController extends Controller
{
    private $authorize;

    public function __construct(
        private PostInterface $postApi,
        private TermInterface $termApi
    ) {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     * @return \Inertia\Response
     */
    public function index(Request $request)
    {
        authorize('list-product');

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
                    ['terms.taxonomy', 'name', 'product_tag']
                ],
                [
                    ['terms', 'name', $request->category],
                    ['terms.taxonomy', 'name', 'product_category']
                ]
            ],
        ];

        $products = $this->postApi
            ->setSearchableFields('title')
            ->setWith('author', 'terms.taxonomy')
            ->list(
                'product',
                $filters,
                $order,
                $request->perPage ?? 10
            )
            ->appends($request->all());

        $filters = [
            'authors' => User::select('users.name')->get()->map(fn($u) => $u->name),
            'tags' => app(Term::class)->select('terms.name')->whereRelation('taxonomy', 'name', 'product_tag')->get()->map(fn($t) => $t->name),
            'categories' => app(Term::class)->select('terms.name')->whereRelation('taxonomy', 'name', 'product_category')->get()->map(fn($t) => $t->name),
        ];

        return Inertia::render('Product/Index', compact('products', 'filters'));
    }

    public function create()
    {
        authorize('add-product');

        $users = User::get();
        $templates = \PageTemplates::listBackend('product');
        $taxonomies = $this->termApi->getByPostType('product');

        return Inertia::render('Product/Create', compact('users', 'templates', 'taxonomies'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  \App\Http\Requests\Backend\StoreProductRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreProductRequest $request)
    {
        authorize('add-product');

        $product = $this->postApi->storePostWithMeta(
            [
                'type' => 'product',
                'title' => $request->title,
                'slug' => $request->slug,
                'content' => $request->content,
                'author_id' => $request->author_id,
                'status' => $request->status,
            ],
            $request->meta,
            $request->term
        );

        if ($product) {
            return to_route('cms.product.edit', $product->id)
                ->with('success', 'Product successfully created.');
        } else {
            return to_route('cms.product')
                ->with('error', 'Failed create Product.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return \Inertia\Response
     */
    public function edit($id)
    {
        authorize('edit-product');

        $post = Post::findOrFail($id);
        $product = [
            "title" => $post->title,
            "slug" => $post->slug,
            "content" => $post->content,
            "status" => $post->status,
            "author_id" => $post->author_id,
            "meta" => [
                "sub_title" => $this->postApi->getMeta($post, 'sub_title'),
                "meta_title" => $this->postApi->getMeta($post, 'meta_title'),
                "meta_description" => $this->postApi->getMeta($post, 'meta_description'),
                "page_template" => $this->postApi->getMeta($post, 'page_template') ?? 'default',
            ],
            "term" => [
                "product_category" => $post->terms->filter(fn($term) => $term->taxonomy->name === 'product_category')->pluck('id')->toArray(),
                "product_tag" => $post->terms->filter(fn($term) => $term->taxonomy->name === 'product_tag')->pluck('id')->toArray(),
            ],
            // tidak masuk formData
            "id" => $post->id,
            'featured_image' => $post->featured_image,
            'permalink' => \Routing::getPermalink($post)
        ];

        $users = User::get();
        $templates = \PageTemplates::listBackend('product');
        $taxonomies = $this->termApi->getByPostType('product');

        return Inertia::render('Product/Edit', compact('users', 'templates', 'taxonomies', 'product'));
    }


    /**
     * Update the specified resource in storage.
     * @param UpdateProductRequest $request
     * @param int $productId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateProductRequest $request, $productId)
    {
        authorize('edit-product');

        $product = $this->postApi->updatePostWithMeta(
            $productId,
            [
                'type' => 'product',
                'title' => $request->title,
                'slug' => $request->slug,
                'content' => $request->content,
                'author_id' => $request->author_id,
                'status' => $request->status,
            ],
            $request->meta,
            $request->term
        );

        if ($product) {
            return to_route('cms.product.edit', $productId)
                ->with('success', 'Product successfully updated.');
        } else {
            return to_route('cms.product.edit', $productId)
                ->with('error', 'Failed update Product.');
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $productId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($productId)
    {
        authorize('delete-product');

        if ($this->postApi->deletePost($productId)) {
            return to_route('cms.product')
                ->with('success', 'Product successfully deleted.');
        } else {
            return to_route('cms.product')
                ->with('error', 'Failed delete Product.');
        }
    }
}