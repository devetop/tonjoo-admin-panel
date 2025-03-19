<?php

namespace App\Http\Controllers\Backend\CMS;

use App\Http\Controllers\Controller;
use App\Api\Contracts\TermInterface;

use App\Models\Taxonomy;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductCategoryController extends Controller
{
    public function __construct(
        private TermInterface $termApi,
        private Taxonomy $taxonomy
    ){}

    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    public function index(Request $request)
    {
        authorize('list-taxonomy');

        $this->checkTaxonomy('product_category');
        
        $categories = $this->termApi->getTerms('product_category', $request->search, $request->perPage ?? 10)->appends($request->all());

        return Inertia::render('Product/Category/Index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Inertia\Response
     */
    public function create()
    {
        authorize('add-taxonomy');

        $this->checkTaxonomy('product_category');

        $categories = $this->termApi->getFlat('product_category');

        return Inertia::render('Product/Category/Create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response |  \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        authorize('add-taxonomy');

        $this->checkTaxonomy('product_category');

        $request->validate([
            'name' => 'required',
            'parent_term_id' => 'nullable|sometimes|exists:terms,id',
        ]);

        $created = $this->termApi->createTerm(
            'product_category',
            $request->name,
            $request->parent_term_id
        );
        
        if ($request->redirect_back) {
            return back();
        }

        if (!$created) {
            return to_route('cms.product.category.index')->with('error', "Failed create Post Category.");
        }
        return to_route('cms.product.category.index')->with('success', 'Post Category successfully created.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $categoryId
     * @return \Inertia\Response
     */
    public function edit($categoryId)
    {
        authorize('edit-taxonomy');

        $this->checkTaxonomy('product_category');

        $category = $this->termApi->find($categoryId);
        $category = [
            'id' => $category['id'],
            'parent_term_id' => $category['parent_term_id'],
            'name' => $category['name'],
        ];

        $categories = $this->termApi->getFlat('product_category');

        return Inertia::render('Product/Category/Edit', compact('category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $categoryId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $categoryId)
    {
        authorize('edit-taxonomy');

        $this->checkTaxonomy('product_category');

        $request->validate([
            'name' => 'required',
            'parent_term_id' => 'nullable|sometimes|exists:terms,id',
        ]);

        $updated = $this->termApi->updateTerm(
            $categoryId,
            $request->name,
            $request->parent_term_id
        );

        if (!$updated) {
            return to_route('cms.product.category.index')->with('error', "Failed update Category Product.");
        }

        return to_route('cms.product.category.index')->with('success', 'Category Product successfully created.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $categoryId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($categoryId)
    {
        authorize('delete-taxonomy');

        $this->checkTaxonomy('product_category');

        $deleted = $this->termApi->deleteTerm($categoryId);

        if (!$deleted) {
            return to_route('cms.product.category.index')->with('error', "Failed delete Product Category.");
        }

        return to_route('cms.product.category.index')->with('success', 'Product Category successfully deleted.');
    }

    private function checkTaxonomy($taxonomy)
    {
        $allowedTaxonomies = array_keys(config('cms.term.taxonomies', []));
        if (!in_array($taxonomy, $allowedTaxonomies)) {
            abort(404);
        }
    }
}

