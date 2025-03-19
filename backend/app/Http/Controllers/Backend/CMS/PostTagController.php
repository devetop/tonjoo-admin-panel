<?php

namespace App\Http\Controllers\Backend\CMS;

use App\Http\Controllers\Controller;
use App\Api\Contracts\TermInterface;

use App\Models\Taxonomy;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PostTagController extends Controller
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

        $this->checkTaxonomy('post_tag');
        
        $tags = $this->termApi->getTerms('post_tag', $request->search, $request->perPage ?? 10)->appends($request->all());

        return Inertia::render('Post/Tag/Index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Inertia\Response
     */
    public function create()
    {
        authorize('add-taxonomy');

        $this->checkTaxonomy('post_tag');

        $terms = $this->termApi->getFlat('post_tag');

        return Inertia::render('Post/Tag/Create', compact('terms'));
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

        $this->checkTaxonomy('post_tag');

        $request->validate([
            'name' => 'required',
            'parent_term_id' => 'nullable|sometimes|exists:terms,id',
        ]);

        $created = $this->termApi->createTerm(
            'post_tag',
            $request->name,
            $request->parent_term_id
        );

        $taxonomyTitle = config('term.taxonomies.post_tag.title');

        if (!$created) {
            return to_route('cms.post.tag.index')->with('error', "Failed create $taxonomyTitle.");
        }
        
        if ($request->redirect_back) {
            return back();
        }

        return to_route('cms.post.tag.index')->with('success', ucwords($taxonomyTitle).' successfully created.');
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

        $this->checkTaxonomy('post_tag');

        $tag = $this->termApi->find($tagId);

        return Inertia::render('Post/Tag/Edit', compact('tag'));
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

        $this->checkTaxonomy('post_tag');

        $request->validate([
            'name' => 'required',
            'parent_term_id' => 'nullable|sometimes|exists:terms,id',
        ]);

        $updated = $this->termApi->updateTerm(
            $tagId,
            $request->name,
            $request->parent_term_id
        );

        $taxonomyTitle = config('term.taxonomies.post_tag.title');

        if (!$updated) {
            return to_route('cms.post.tag.index')->with('error', "Failed update $taxonomyTitle.");
        }

        return to_route('cms.post.tag.index')->with('success', ucwords($taxonomyTitle).' successfully created.');
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

        $this->checkTaxonomy('post_tag');

        $deleted = $this->termApi->deleteTerm($tagId);

        $taxonomyTitle = config('term.taxonomies.post_tag.title');

        if (!$deleted) {
            return to_route('cms.post.tag.index')->with('error', "Failed delete $taxonomyTitle.");
        }

        return to_route('cms.post.tag.index')->with('success', $taxonomyTitle . ' successfully deleted.');
    }

    private function checkTaxonomy($taxonomy)
    {
        $allowedTaxonomies = array_keys(config('cms.term.taxonomies', []));
        if (!in_array($taxonomy, $allowedTaxonomies)) {
            abort(404);
        }
    }
}

