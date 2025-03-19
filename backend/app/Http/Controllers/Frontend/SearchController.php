<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use App\Models\Post;

class SearchController extends Controller
{
    protected $searchablePostType = [
        'post',
        'page',
    ];

    protected $searchableFields = [
        'title',
        'slug',
        'content',
    ];

    private $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function index(Request $request)
    {
        $query = $this->post->ofType($this->searchablePostType);

        if ($searchFilter = $request->keyword) {
            $query = $query->where(function ($subQuery) use ($searchFilter) {
                foreach ($this->searchableFields as $column) {
                    $subQuery->orWhere($column, 'LIKE', '%'.$searchFilter.'%');
                }
            });
        }

        if ($orderBy = $request->order_by) {
            foreach ($orderBy as $key => $value) {
                if (is_numeric($key)) {
                    $query->orderBy($value, 'ASC');
                } else {
                    $query->orderBy($key, $value);
                }
            }
        }

        if ($perPage = $request->per_page ?? 10) {
            $list = $query->paginate($perPage);
        } else {
            $list = $query->get();
        }

        return view('frontend.search-result', compact('list'));
    }
}


