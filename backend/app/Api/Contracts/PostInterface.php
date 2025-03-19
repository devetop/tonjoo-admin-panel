<?php

namespace App\Api\Contracts;

interface PostInterface
{
    /**
     * @param string|array<string> $args
     * @return PostInterface
     */
    public function setSearchableFields(...$args) : PostInterface;

    /**
     * @param string $type
     * @param array $filters
     * @param array $orderBy
     * @param integer $perPage
     * @return Illuminate\Support\Collection|Illuminate\Pagination\LengthAwarePaginator
     */
    public function list($type = 'post', $filters = [], $orderBy = [], $perPage = 10);

    /**
     * @param array<string> $types
     * @param array $filters
     * @param array $orderBy
     * @param integer $perPage
     * @return Illuminate\Support\Collection|Illuminate\Pagination\LengthAwarePaginator
     */
    public function listAny($types = [], $filters = [], $orderBy = [], $perPage = 10);

    /**
     * @param string $slug
     * @return Post
     */
    public function single(string $slug);

    /**
     * @param string $slug
     * @return Post
     */
    public function singleAny(string $slug, $types = []);

    /**
     * @param App\Models\Post|integer $post
     * @param string $key
     * @return mixed
     */
    public function getMeta($post, $key);

    /**
     * @param App\Models\Post|integer $post
     * @param string $key
     * @param mixed $value
     * @param boolean $serialize
     * @return mixed
     */
    public function setMeta($post, $key, $value, $serialize = false);

    public function find($postId);

    public function setTerms($post, string $taxonomy, array $terms);
    public function getTerms($post, string $taxonomy);

    /**
     * @param array<string, string> $postData
     * @param array<string, string| \Illuminate\Http\UploadedFile> $meta
     * @param array<string, array<string>> $term
     * @return boolean|\App\Models\Post
     */
    public function storePostWithMeta(array $postData, $metas = [], $taxonomies_terms = []) : bool | \App\Models\Post;

    /**
     * @param int $postId
     * @param array<string, string> $updatePostData
     * @param array<string, string| \Illuminate\Http\UploadedFile> $meta
     * @param array<string, array<string>> $term
     * @return boolean|\App\Models\Post
     */
    public function updatePostWithMeta(int $postId, array $updatePostData, $metas = [], $taxonomies_terms = []) : bool | \App\Models\Post;

    /**
     * @param int $postId
     * @return bool
     */
    public function deletePost($postId) : bool;

    /**
     * @param \Illuminate\Http\Request $request 
     * @param string $post_type
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function frontendList(\Illuminate\Http\Request $request, string $post_type) : \Illuminate\Pagination\LengthAwarePaginator;

    /**
     * @param \Illuminate\Http\Request $request 
     * @param string $user_id
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function getByUserId(\Illuminate\Http\Request $request, string $user_id) : \Illuminate\Pagination\LengthAwarePaginator;
}
