<?php

namespace App\Api\Services;

use App\Api\Contracts\ImageStorageInterface;
use App\Api\Contracts\PostInterface;
use App\Http\Enums\PostStatus;
use App\Models\FileUpload;
use App\Models\Post;
use Illuminate\Http\Request;

class PostEloquent implements PostInterface
{
    use FillsDefaultFromRequest;

    protected $model;
    protected $imageStorage;
    protected $searchableFields = [
        'title',
        'slug',
        'content',
    ];

    /**
     * @param Post $model
     * @return PostEloquent
     */
    public function __construct(
        Post $model,
        ImageStorageInterface $imageStorage
    ){
        $this->model = $model;
        $this->imageStorage = $imageStorage;
    }

    /**
     * @param string|array<string> $args
     * @return PostInterface
     */
    function setSearchableFields(...$args) : PostInterface {
        if(gettype($args[0]) == 'array') {
            $this->searchableFields = $args[0];
        } else {
            $this->searchableFields = $args;
        }
        return $this;
    }

    /**
     * @param string|array<string> $args
     * @return PostInterface
     */
    function setWith(...$args) : PostInterface {
        if(gettype($args[0]) == 'array') {
            $this->model = $this->model->with($args[0]);
        } else {
            $this->model = $this->model->with($args);
        }
        return $this;
    }

    private function hydratePost($post)
    {
        if (!is_object($post)) {
            return $this->model->find($post);
        }
        return $post;
    }

    /**
     * @param string $type
     * @param array $filters
     * @param array $orderBy
     * @param integer $perPage
     * @return Illuminate\Support\Collection|Illuminate\Pagination\LengthAwarePaginator
     */
    public function list($type = 'post', $filters = ['column' => ['status' => PostStatus::PUBLISH]], $orderBy = [], $perPage = 10)
    {
        //hanya post publish
        $query = $this->model->ofType($type);

        return $this->doListQuery($filters, $query, $orderBy, $perPage);
    }

    /**
     * @param array $filters
     * @param array $orderBy
     * @param integer $perPage
     * @return Illuminate\Support\Collection|Illuminate\Pagination\LengthAwarePaginator
     */
    public function listAny($types = [], $filters = [], $orderBy = [], $perPage = 10)
    {
        //any post
        $query = $this->model->statusPublished();
        if ($types) {
            $query = $query->ofType($types);
        }
        return $this->doListQuery($filters, $query, $orderBy, $perPage);
    }

    // public listCustom

    protected function doListQuery($filters, $query, $orderBy = [], $perPage = 10)
    {
        if ($columnFilter = $this->fillDefaults(@$filters['relation'] ?? [], 'filters.relation')) {
            foreach ($columnFilter as $relations) {
                if(!$relations[0][2]) {
                    continue;
                }
                foreach ($relations as $relation) {
                    $query = is_array(@$relation[2])
                        ? $query->whereHas($relation[0], fn($q) => $q->whereIn($relation[1], $relation[2]))
                        : $query->whereRelation(...$relation);
                }
            }
        }
        
        if ($columnFilter = $this->fillDefaults(@$filters['column'] ?? [], 'filters.column')) {
            $query = $query->where(function ($subQuery) use ($columnFilter) {
                foreach ($columnFilter as $column => $value) {
                    if ($value) {
                        $subQuery->where($column, $value);
                    }
                }
            });
        }

        if ($searchFilter = $this->fillDefaults(@$filters['search'] ?? [], 'filters.search')) {
            $query = $query->where(function ($subQuery) use ($searchFilter) {
                foreach ($this->searchableFields as $column) {
                    $subQuery->orWhere($column, 'LIKE', '%'.$searchFilter.'%');
                }
            });
        }

        if ($orderBy = $this->fillDefaults($orderBy, 'order_by')) {
            foreach ($orderBy as $key => $value) {
                if (is_numeric($key)) {
                    $query->orderBy($value, 'ASC');
                } else {
                    $query->orderBy($key, $value);
                }
            }
        } else {
            // default order by newest first
            $query->latest('created_at');
        }

        if ($perPage = $this->requestAsDefault($perPage, 'per_page')) {
            $list = $query->paginate($perPage);
            return $list;
        }

        return $query->get();
    }

    /**
     * @param string $slug
     * @return Post
     */
    public function single(string $slug)
    {
        return $this->model
                    ->typePost()
                    ->where('slug', $slug)
                    ->first();
    }

    /**
     * @param string $slug
     * @return Post
     */
    public function singleAny(string $slug, $types = [])
    {
        $query = $this->model
                      ->where('slug', $slug)
                  ->ofType($types);
        return $query->first();
    }

    /**
     * @param Post|integer $post
     * @param string $key
     * @return mixed
     */
    public function getMeta($post, $key)
    {
        if (!$post) return null;

        $post = $this->hydratePost($post);

        $meta = $post->post_metas->where('key', $key);
        if ($meta->count() == 0) return null;

        if ($meta->count() == 1) {
            $meta = $meta->first();
            if ($meta->is_serialized) {
                return $this->unserialize($meta->value);
            }
            return $meta->value;
        }

        else if ($meta->count() > 1) {

            $result = [];
            foreach ($meta as $metaItem) {
                $result[] = $metaItem->value;
            }

            return $result;
        }

        return $meta->value;
    }

    private function serialize($meta)
    {
        if (is_array($meta) || is_object($meta)) {
            return serialize($meta);
        }

        return $meta;
    }

    private function unserialize($meta)
    {
        return @unserialize($meta) ?? $meta;
    }

    /**
     * @param Post|integer $post
     * @param string $key
     * @param mixed $value
     * @param boolean $serialize
     * @return mixed
     */
    public function setMeta($post, $key, $value, $serialize = false)
    {
        $post = $this->hydratePost($post);
        $existing = $post->post_metas->where('key', $key);

        if ($existing->count() > 1) {
            foreach ($existing as $deleteExist) {
                $deleteExist->delete();
            }
            $this->storeMeta($post, $key, $value, $serialize);
        } else {
            $existing = $existing->first();//get first value if not array
            if ($existing) {
                if (is_array($value)) {
                    $existing->delete();
                    return $this->storeMeta($post, $key, $value, $serialize);
                } else {
                    $existing->value = $value;
                    $existing->save();
                    return $existing;
                }
            } else {
                return $this->storeMeta($post, $key, $value, $serialize);
            }
        }
    }

    private function storeMeta($post, $key, $value, $serialize = false)
    {
        if (is_array($value)) {
            if ($serialize) {
                $value = $this->serialize($value);
                return $post->post_metas()->create([
                    'key' => $key,
                    'value' => $value,
                    'is_serialized' => $serialize,
                ]);
            } else {
                $saved = [];
                foreach ($value as $itemValue) {
                    $saved[] = $post->post_metas()->create([
                        'key' => $key,
                        'value' => $itemValue,
                        'is_serialized' => $serialize,
                    ]);
                }
                return $saved;
            }
        } else {
            return $post->post_metas()->create([
                'key' => $key,
                'value' => $value,
                'is_serialized' => false,
            ]);
        }
    }

    public function find($postId)
    {
        return $this->model->find($postId);
    }

    public function setTerms($post, string $taxonomy, array $terms)
    {
        $post = $this->hydratePost($post);

        /**
         * hanya detach term dengan taxonomy yang ditentukan
         */

        $detaches = $post->terms()->whereHas('taxonomy', function ($qTax) use ($taxonomy) {
            $qTax->where('name', $taxonomy);
        })->get()->pluck('id');

        $post->terms()->detach($detaches->toArray());

        /**
         * attach terms sesuai parameter
         */

        foreach ($terms as $term) {
            $post->terms()->attach($term);
        }
    }

    public function getTerms($post, string $taxonomy)
    {
        if (!$post) return null;

        $post = $this->hydratePost($post);
        $terms = $post->terms()->whereHas('taxonomy', function ($qTax) use ($taxonomy) {
            $qTax->where('name', $taxonomy);
        })->get();

        return $terms;
    }

    /**
     * @param array<string, string> $postData
     * @param array<string, string| \Illuminate\Http\UploadedFile> $meta
     * @param array<string, array<string>> $term
     * @return boolean|\App\Models\Post
     */
    public function storePostWithMeta(array $postData, $metas = [], $taxonomies_terms = []) : bool | Post {
        \DB::beginTransaction();
        try {
            $post = Post::create($postData);

            /**
             * - untuk post meta gunakan API ini
             * - supaya tidak perlu coding berkali2 di controller, gunakan array key meta di input
             */
            if($metas) {
                foreach ($metas as $key => $value) {
                    if (!$value)
                        continue;
    
                    if (is_object($value) && $value instanceof \Illuminate\Http\UploadedFile) {
                        $metaImage = $this->imageStorage->uploadImage($value, [], (@$postData['type'] ?? 'post') . '/', TRUE);

                        if (!empty($metaImage)) {
                            $this->setMeta($post, $key, $metaImage, false);
                        }
                    } else {

                        if ($key === 'featured_image_url') { // persist new featured image
                            app(FileUpload::class)->ofFileUrl($value)->update(['is_persisted' => true]);
                        }

                        if ($key === 'sliders') { // persist new slider image
                            collect($value)->map(function($newSlider) { 
                                if (@$newSlider['url']) {
                                    app(FileUpload::class)->ofFileUrl(@$newSlider['url'])->update(['is_persisted' => true]);
                                }
                            });
                        }

                        $this->setMeta($post, $key, $value, is_array($value));
                    }
                }
            }

            if($taxonomies_terms) {
                foreach ($taxonomies_terms as $taxonomy => $terms) {
                    $this->setTerms($post, $taxonomy, $terms);
                }
            }

            \DB::commit();
         
            return $post;   
        } catch (\Throwable $th) {
            \DB::rollBack();
            \Log::error($th);
            return false;
        }
    }

    /**
     * @param int $postId
     * @param array<string, string> $updatePostData
     * @param array<string, string| \Illuminate\Http\UploadedFile> $meta
     * @param array<string, array<string>> $term
     * @return bool|\App\Models\Post
     */
    public function updatePostWithMeta(int $postId, array $updatePostData, $metas = [], $taxonomies_terms = []) : bool | Post {
        \DB::beginTransaction();
        try {
            $existingData = Post::findOrFail($postId);

            $data = [
                'title' => $updatePostData['title'],
                'content' => $updatePostData['content'],
                'author_id' => $updatePostData['author_id'],
                'status' => $updatePostData['status'],
            ];

            if (!$existingData->update($data)) 
                return false;

            /**
             * - untuk post meta gunakan API ini
             * - supaya tidak perlu coding berkali2 di controller, gunakan array key meta di input
             */
            if ($metas) {
                foreach ($metas as $key => $value) {
                    if (!$value)
                        continue;

                    if (is_object($value) && $value instanceof \Illuminate\Http\UploadedFile) {
                        $metaImage = $this->imageStorage->uploadImage($value, [], (@$updatePostData['type'] ?? 'post') . '/', TRUE);
                        $savedFile = $this->getMeta($postId, $key);
                        
                        if (!empty($savedFile) && $metaImage) {
                            $this->imageStorage->deleteImage($savedFile, (@$updatePostData['type'] ?? 'post') . '/', TRUE);
                        }

                        if (!empty($metaImage)) {
                            $this->setMeta($postId, $key, $metaImage, false);
                        }
                    } else {
                        if ($key === 'featured_image_url') { // handle meta featured image
                            $oldFeaturedImageUrl = $this->getMeta($postId, $key);
                            if ($oldFeaturedImageUrl !== null && $oldFeaturedImageUrl !== $value) {  // unpersist old featured image
                                app(FileUpload::class)->ofFileUrl($oldFeaturedImageUrl)->update(['is_persisted' => false]);
                            }
                            app(FileUpload::class)->ofFileUrl($value)->update(['is_persisted' => true]); // persist new featured image
                        }

                        if ($key === 'sliders') { // handler meta sliders
                            $oldSliders = $this->getMeta($postId, $key);

                            if (@$oldSliders) { // unpersist old slider image
                                collect($oldSliders ?? [])->map(function($item) use($value) {
                                    $oldSliderUrl = @$item['url'];
                                    if (!collect($value)->pluck('url')->contains($oldSliderUrl)) {
                                        app(FileUpload::class)->ofFileUrl($oldSliderUrl)->update(['is_persisted' => false]);
                                    }
                                });
                            }

                            collect($value)->map(function($newSlider) { // persist new slider image
                                if (@$newSlider['url']) {
                                    app(FileUpload::class)->ofFileUrl(@$newSlider['url'])->update(['is_persisted' => true]);
                                }
                            });
                        }

                        $this->setMeta($postId, $key, $value, is_array($value));
                    }
                }
            }

            /**
             * untuk update perlu cek term yang terdaftar di post-type
             * dihapus semua term per taxonomy yang terdaftar tapi
             * tidak ada di request['term'] => $taxonomy
             */
            if ($taxonomies_terms) {
                $registeredTaxonomies = config('cms.term.post-type-taxonomies.' . $existingData->type, []);
                $setTerms = [];

                foreach ($registeredTaxonomies as $registered) {
                    if ($taxonomies_terms[$registered]) {
                        $setTerms[$registered] = $taxonomies_terms[$registered];
                    } else {
                        $setTerms[$registered] = [];
                    }
                }

                foreach ($setTerms as $taxonomy => $terms) {
                    $this->setTerms($postId, $taxonomy, $terms);
                }
            }
            
            \DB::commit();
            return $existingData;
        } catch (\Throwable $th) {
            \DB::rollBack();
            \Log::error($th);
            return false;
        }
    }

    public function deletePost($postId) : bool {
        $getData = $this->model->findOrFail($postId);

        if ($getData->status !== PostStatus::DRAFT->value) {
            return false;
        }
        $getData->post_metas->map(function ($meta) {
            if (!$meta?->value) {
                $meta->delete();
                return false;
            }

            if($meta->key === 'featured_image') {
                $this->imageStorage->deleteImage($meta->value, Post::IMAGE_FOLDER, TRUE);
            }

            $meta->delete();
        });

        $getData->delete();

        return true;
    }

    public function frontendList(Request $request, string $post_type) : \Illuminate\Pagination\LengthAwarePaginator {
        $posts = Post::select('posts.*')
            ->where('posts.status', PostStatus::PUBLISH)
            ->where('posts.type', $post_type);

        
        return $this->getPosts($posts, $request);
    }

    public function getByUserId(Request $request, string $user_id) : \Illuminate\Pagination\LengthAwarePaginator {
        $posts = Post::select('posts.*')
            ->where('posts.status', PostStatus::PUBLISH)
            ->where('posts.author_id', $user_id);

        return $this->getPosts($posts, $request);
    }

    private function getPosts($posts, Request $request ){
        if($request->category) {
            $posts = $posts->whereHas('terms', function($query) use($request) {
                $query->where('terms.slug', $request->category);
                $query->whereHas('taxonomy', function($query) {
                    $query->where('name', 'like', '%_category');
                });
            });
        }

        if($request->tag) {
            $posts = $posts->whereHas('terms', function($query) use($request) {
                $query->whereIn('terms.slug', $request->tag);
                $query->whereHas('taxonomy', function($query) {
                    $query->where('name', 'like', '%_tag');
                });
            });
        }

        return $posts
            ->paginate($request->perPage ?? 10)
            ->appends($request->all());
    }
}
