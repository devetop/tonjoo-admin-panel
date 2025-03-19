<?php

namespace App\Api\Contracts;

interface TermInterface
{
    /**
     * @param string $taxonomyName
     * @param string $termName
     * @param mixed $parentTermId
     * @return mixed
     */
    public function createTerm(string $taxonomyName, string $termName, $parentTermId = null);

    /**
     * @param mixed $termId
     * @param string $termName
     * @param mixed $parentTermId
     * @return mixed
     */
    public function updateTerm($termId, string $termName, $parentTermId = null);

    /**
     * @param string $taxonomyName
     * @param mixed $search
     * @param integer $perPage
     * @return Illuminate\Support\Collection
     */
    public function getTerms(string $taxonomyName, $search = null, $perPage = 0);

    /**
     * @param string $taxonomyName
     * @return mixed
     */
    public function getParentTerms(string $taxonomyName);

    /**
     * @param integer $id
     * @return mixed
     */
    public function deleteTerm($id);

    /**
     * @param mixed $id
     * @return mixed
     */
    public function find($id);

    /**
     * @param string $taxonomyName
     * @return array
     */
    public function getNested(string $taxonomyName);

    /**
     * @param string $taxonomyName
     * @return array
     */
    public function getFlat(string $taxonomyName);

    /**
     * @param string $postType
     * @return array
     */
    public function getByPostType(string $postType);

    /**
     * @param \App\Models\Term|integer $term
     * @param string $key
     * @param mixed $value
     * @param boolean $serialize
     * @return mixed
     */
    public function setMeta($term, $key, $value, $serialize = false);

    /**
     * @param \App\Models\Term|integer $term
     * @param string $key
     * @return mixed
     */
    public function getMeta($term, $key);

    /**
     * @param array<string, string> $termData
     * @param array<string, string| \Illuminate\Http\UploadedFile> $metas
     * @return boolean|\App\Models\Term
     */
    public function storeTermWithMeta($termData, $metas);

    /**
     * @param array<string, string> $updateTermData
     * @param array<string, string| \Illuminate\Http\UploadedFile> $metas
     * @return boolean|\App\Models\Term
     */
    public function updateTermWithMeta($updateTermData, $metas);
}
