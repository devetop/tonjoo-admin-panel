<?php

namespace App\Http\Controllers\Backend;

use App\Api\Contracts\ImageStorageInterface;
use App\Http\Enums\PostStatus;
use App\Models\Post;
use App\Models\Postmeta;
use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Http\Requests\Backend\StoreMediaRequest;
use App\Http\Requests\Backend\UpdateMediaRequest;

class MediaController extends Controller
{
    private $imageStorage;

	public function __construct(ImageStorageInterface $imageStorage)
	{
		$this->middleware('auth:admin');

        $this->imageStorage = $imageStorage;
	}

	/**
     * Display a listing of the resource.
     * @return \Inertia\Response
     */
    public function index(Request $request)
    {
        authorize('list-media');

        $order = ($request->sortBy && $request->orderBy) ?
            [
                'sortBy'  => $request->sortBy,
                'orderBy' => $request->orderBy
            ] : [
                'sortBy'  => 'posts.created_at',
                'orderBy' => 'DESC'
            ];
        $paginate = ($request->perPage) ? $request->perPage : 8;
        $posts = Post::where('type', 'image')
            ->ofSearch($request->search)
            ->ofFilters($order)
            ->select(['posts.id','title', 'slug', 'content', 'status', 'posts.updated_at'])
            ->paginate($request->perPage);

        foreach ($posts as &$data) {
            $data->thumbnail_image = $this->imageStorage->getUrl('media/', $data->content);
            $data->forhuman_updated_at = $data->updated_at->diffForHumans();
        }

        return inertia('Media/Index', compact('posts'));
    }

    public function create()
    {
        authorize('add-media');

        $users = User::get();
        $statuses = PostStatus::allValues();

        return inertia('Media/Create', compact('users', 'statuses'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  \App\Http\Requests\Backend\StoreMediaRequest $request
     * @return Renderable
     */
    public function store(StoreMediaRequest $request)
    {
        authorize('add-media');

        $data = [
            'title'     => $request->title,
            'author_id' => $request->author_id,
            'type'      => 'image',
            'status'    => $request->status,
        ];

        $mediaImage = NULL;
        if ($request->hasFile('media_image')) {
            $mediaImage = $this->imageStorage->uploadImage($request->file('media_image'), [], 'media/', TRUE);
        }
        if (!empty($mediaImage)) {
            $data['content'] = $mediaImage;
        }

        $post = Post::create($data);

        if ($post) {
            return redirect(route('cms.media'))
                ->with('message', 'Data successfully created.');
        } else {
            return redirect(route('cms.media'))
                ->with('message', 'Failed create data.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return \Inertia\Response
     */
    public function edit($id)
    {
        authorize('edit-media');

        $post = Post::join('users', 'users.id', '=', 'posts.author_id')
            ->where('posts.id', $id)
            ->select(['posts.id','title', 'author_id', 'users.name AS author_name', 'content', 'status', 'posts.updated_at'])
            ->firstOrFail();
        $post->media_image = $this->imageStorage->getUrl('media/', $post->content);
        $post->old_image = $post->media_image;
        $post->forhuman_updated_at = $post->updated_at->diffForHumans();
        $users = User::get();
        $statuses = PostStatus::allValues();

        return inertia('Media/Edit', compact('post', 'users', 'statuses'));
    }

    /**
     * Update the specified resource in storage.
     * @param UpdateMediaRequest $request
     * @param int $id
     * @return Renderable
     */
    public function update(UpdateMediaRequest $request, $id)
    {
        authorize('edit-media');

        $existingData = Post::findOrFail($id);

        $data = [
            'title' => $request->title,
            'author_id' => $request->author_id,
            'status' => $request->status,
        ];

        $mediaImage = NULL;
        if ($request->hasFile('media_image')) {
            $mediaImage = $this->imageStorage->uploadImage($request->file('media_image'), [], 'media/', TRUE);
            if (!empty($existingData->content) && $mediaImage) {
                $this->imageStorage->deleteImage($existingData->content, 'media/', TRUE);
            }
        }
        if (!empty($mediaImage)) {
            $data['content'] = $mediaImage;
        }


        if ($existingData->update($data)) {
            return redirect(route('cms.media'))
                ->with('status', 'Data successfully updated.');
        } else {
            return redirect(route('cms.media'))
                ->with('status', 'Failed update data.');
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        authorize('delete-media');

        $getData = Post::findOrFail($id);

        if (!empty($getData->content)) {
            $this->imageStorage->deleteImage($getData->content, 'media/', TRUE);
        }
        $getData->delete();

        return redirect(route('cms.media'))
            ->with('message', 'Content successfully deleted.');
    }
}
