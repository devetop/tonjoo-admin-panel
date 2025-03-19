<?php

namespace App\Http\Controllers\FrontendDashboardApi\CMS;

use App\Api\Contracts\TermInterface;
use App\Http\Controllers\Controller;
use App\Models\Term;
use Illuminate\Http\Request;

class ProductTagController extends Controller
{
    public function __construct(
        private TermInterface $termService,
    ) { }

    public function index(Request $request)
    {
        $tags = $this->termService->getTerms('product_tag', $request->search);

        return response()->json([
            'success' => true,
            'data' => compact('tags')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function select()
    {
        return response()->json([
            'data' => app(Term::class)->whereRelation('taxonomy', 'name', 'product_tag')->pluck('terms.name', 'terms.id')
        ]);
    }
}
