<?php

namespace App\Http\Controllers\Backend\CMS;

use App\Http\Controllers\Controller;
use App\Api\Contracts\TermInterface;

use App\Models\Taxonomy;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PostCategoryController extends Controller
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

        $this->checkTaxonomy('post_category');
        
        $categories = $this->termApi->getTerms('post_category', $request->search, $request->perPage ?? 10)->appends($request->all());

        return Inertia::render('Post/Category/Index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Inertia\Response
     */
    public function create()
    {
        authorize('add-taxonomy');

        $this->checkTaxonomy('post_category');

        $categories = $this->termApi->getFlat('post_category');

        return Inertia::render('Post/Category/Create', compact('categories'));
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

        $this->checkTaxonomy('post_category');

        $request->validate([
            'name' => 'required',
            'parent_term_id' => 'nullable|sometimes|exists:terms,id',
            'meta.description' => ['nullable', 'string'],
        ]);

        $created = $this->termApi->storeTermWithMeta(
            [
                'taxonomy_name' => 'post_category',
                'term_name' => $request->name,
                'parent_term_id' => $request->parent_term_id,
            ],
            $request->meta
        );

        if ($request->redirect_back) {
            return back();
        }

        if (!$created) {
            return to_route('cms.post.category.index')->with('error', "Failed create Post Category.");
        }
        return to_route('cms.post.category.index')->with('success', 'Post Category successfully created.');
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

        $this->checkTaxonomy('post_category');

        $category = $this->termApi->find($categoryId);
        $category = [
            'id' => $category->id,
            'parent_term_id' => $category->parent_term_id,
            'name' => $category->name,
            'meta' => [
                'description' => $this->termApi->getMeta($category, 'description')
            ]
        ];

        $categories = $this->termApi->getFlat('post_category');

        return Inertia::render('Post/Category/Edit', compact('category', 'categories'));
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

        $this->checkTaxonomy('post_category');

        $request->validate([
            'name' => 'required',
            'parent_term_id' => 'nullable|sometimes|exists:terms,id',
            'meta.description' => 'nullable|string',
        ]);

        $updated = $this->termApi->updateTermWithMeta(
            [
                'term_id' => $categoryId,
                'term_name' => $request->name,
                'parent_term_id' => $request->parent_term_id
            ],
            $request->meta
        );

        if (!$updated) {
            return to_route('cms.post.category.index')->with('error', "Failed update Category Post.");
        }

        return to_route('cms.post.category.index')->with('success', 'Category Post successfully updated.');
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

        $this->checkTaxonomy('post_category');

        $deleted = $this->termApi->deleteTerm($categoryId);

        if (!$deleted) {
            return to_route('cms.post.category.index')->with('error', "Failed delete Post Category.");
        }

        return to_route('cms.post.category.index')->with('success', 'Post Category successfully deleted.');
    }

    private function checkTaxonomy($taxonomy)
    {
        $allowedTaxonomies = array_keys(config('cms.term.taxonomies', []));
        if (!in_array($taxonomy, $allowedTaxonomies)) {
            abort(404);
        }
    }
}

