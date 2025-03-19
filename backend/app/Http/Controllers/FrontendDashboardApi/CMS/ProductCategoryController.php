<?php

namespace App\Http\Controllers\FrontendDashboardApi\CMS;

use App\Api\Contracts\TermInterface;
use App\Http\Controllers\Controller;
use App\Models\Taxonomy;
use App\Models\Term;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    public function __construct(
        private TermInterface $termService,
        private Taxonomy $taxonomy,
        private Term $term,
    ) { }

    public function index(Request $request)
    {
        $categories = $this->termService->getTerms('product_category', $request->search, $request->limit);

        return response()->json([
            'success' => true,
            'data' => compact('categories')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'parent_term_id' => 'nullable|sometimes|exists:terms,id',
            'meta.description' => ['nullable', 'string'],
        ]);

        $data = $this->termService->createTerm(
            'product_category',
            $request->input('name'),
            $request->input('parent_term_id')
        );

        if ($data) {
            return response()->json([
                'success' => true,
                'message' => 'Category successfully created.',
                'data' => $data
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Failed create Post Category.'
            ]);
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id)
    {
        $data = $this->term->findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $data
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
        $request->validate([
            'name' => ['required']
        ]);

        $data = $this->term->where('id', $id)->update($request->only('name'));

        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->term->where('id', $id)->delete();

        return response()->json([
            'success' => true,
            'message' => 'Category successfully deleted. '
        ]);
    }

    private function checkTaxonomy($taxonomy)
    {
        $allowedTaxonomies = array_keys(config('cms.term.taxonomies', []));
        if (!in_array($taxonomy, $allowedTaxonomies)) {
            abort(404);
        }
    }

    public function select()
    {
        return response()->json([
            'data' => app(Term::class)->whereRelation('taxonomy', 'name', 'product_category')->pluck('terms.name', 'terms.id')
        ]);
    }
}
