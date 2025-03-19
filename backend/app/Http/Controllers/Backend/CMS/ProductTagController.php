<?php

namespace App\Http\Controllers\Backend\CMS;

use App\Http\Controllers\Controller;
use App\Api\Contracts\TermInterface;

use App\Models\Taxonomy;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductTagController extends Controller
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

        $this->checkTaxonomy('product_tag');
        
        $tags = $this->termApi->getTerms('product_tag', $request->search, $request->perPage ?? 10)->appends($request->all());

        return Inertia::render('Product/Tag/Index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Inertia\Response
     */
    public function create()
    {
        authorize('add-taxonomy');

        $this->checkTaxonomy('product_tag');

        $terms = $this->termApi->getFlat('product_tag');

        return Inertia::render('Product/Tag/Create', compact('terms'));
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

        $this->checkTaxonomy('product_tag');

        $request->validate([
            'name' => 'required',
            'parent_term_id' => 'nullable|sometimes|exists:terms,id',
        ]);

        $created = $this->termApi->createTerm(
            'product_tag',
            $request->name,
            $request->parent_term_id
        );

        if (!$created) {
            return to_route('cms.product.tag.index')->with('error', "Failed create Product Tag.");
        }
        
        if ($request->redirect_back) {
            return back();
        }

        return to_route('cms.product.tag.index')->with('success', 'Product Tag successfully created.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $tagId
     * @return \Inertia\Response
     */
    public function edit($tagId)
    {
        authorize('edit-taxonomy');

        $this->checkTaxonomy('product_tag');

        $tag = $this->termApi->find($tagId);

        return Inertia::render('Product/Tag/Edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $tagId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $tagId)
    {
        authorize('edit-taxonomy');

        $this->checkTaxonomy('product_tag');

        $request->validate([
            'name' => 'required',
            'parent_term_id' => 'nullable|sometimes|exists:terms,id',
        ]);

        $updated = $this->termApi->updateTerm(
            $tagId,
            $request->name,
            $request->parent_term_id
        );

        if (!$updated) {
            return to_route('cms.product.tag.index')->with('error', "Failed update Product Tag.");
        }

        return to_route('cms.product.tag.index')->with('success', 'Product Tag successfully created.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $tagId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($tagId)
    {
        authorize('delete-taxonomy');

        $this->checkTaxonomy('product_tag');

        $deleted = $this->termApi->deleteTerm($tagId);

        if (!$deleted) {
            return to_route('cms.product.tag.index')->with('error', "Failed delete Product Tag.");
        }

        return to_route('cms.product.tag.index')->with('success', 'Product Tag successfully deleted.');
    }

    private function checkTaxonomy($taxonomy)
    {
        $allowedTaxonomies = array_keys(config('cms.term.taxonomies', []));
        if (!in_array($taxonomy, $allowedTaxonomies)) {
            abort(404);
        }
    }
}

