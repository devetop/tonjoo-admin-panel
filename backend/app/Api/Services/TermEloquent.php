<?php

namespace App\Api\Services;

use App\Api\Contracts\TermInterface;
use App\Models\Term;
use App\Models\Taxonomy;
use Illuminate\Pagination\LengthAwarePaginator;

class TermEloquent implements TermInterface
{
    private $term;
    private $taxonomy;
    private $imageStorage;

    public function __construct(Term $term, Taxonomy $taxonomy, ImageStorageService $imageStorage)
    {
        $this->term = $term;
        $this->taxonomy = $taxonomy;
        $this->imageStorage = $imageStorage;
    }

    /**
     * @param string $taxonomyName
     * @param string $termName
     * @param mixed $parentTermId
     * @return mixed
     */
    public function createTerm(string $taxonomyName, string $termName, $parentTermId = null)
    {
        $taxonomy = $this->taxonomy->firstOrCreate([ 'name' => $taxonomyName ]);
        return $taxonomy->terms()->create([
            'name' => $termName,
            'parent_term_id' => $parentTermId,
        ]);
    }

    /**
     * @param mixed $termId
     * @param string $termName
     * @param mixed $parentTermId
     * @return mixed
     */
    public function updateTerm($termId, string $termName, $parentTermId = null)
    {
        $term = $this->term->find($termId);
        if (!$term) return false;

        $term->name = $termName;
        if ($parentTermId) {
            $term->parent_term_id = $parentTermId;
        }

        if (!$term->save()) return false;

        return $term;
    }

    /**
     * @param string $taxonomyName
     * @param mixed $search
     * @param integer $perPage
     * @return Illuminate\Support\Collection
     */
    public function getTerms(string $taxonomyName, $search = null, $perPage = 0)
    {
        $taxonomy = $this->taxonomy->where('name', $taxonomyName)->first();
        if (!$taxonomy) {
            if (empty($perPage)) {
                return collect();
            }

            return new LengthAwarePaginator([], 0, $perPage);
        }

        $query = $taxonomy->terms()->with('parent_term', 'child_terms');

        if ($search) {
            $query->where(function ($qSearch) use ($search) {
                return $qSearch->where('name', 'like', '%'.$search.'%')
                               ->orWhereHas('parent_term', function ($qParent) use ($search) {
                                   return $qParent->where('name', 'like', '%'.$search.'%');
                               });
            });
        }

        if ($perPage) {
            return $query->orderBy('terms.id', 'desc')->paginate($perPage);
        }

        return $query->get();
    }

    /**
     * @param string $taxonomyName
     * @return mixed
     */
    public function getParentTerms(string $taxonomyName)
    {
        $taxonomy = $this->taxonomy->where('name', $taxonomyName)->first();
        if (!$taxonomy) {
            return [];
        }

        return $taxonomy->terms()->whereNull('parent_term_id')->get();
    }

    /**
     * @param integer $id
     * @return mixed
     */
    public function deleteTerm($id)
    {
        $term = $this->term->find($id);
        if (!$term) return false;

        $term->term_metas->map(function ($meta) {
            $meta->delete();
        });

        return $term->delete();
    }

    /**
     * @param mixed $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->term->find($id);
    }

    /**
     * @param string $taxonomyName
     * @return array
     */
    public function getNested(string $taxonomyName)
    {
        $taxonomy = $this->taxonomy->where('name', $taxonomyName)->first();
        if (!$taxonomy) {
            return [];
        }

        $roots = $taxonomy->terms()->whereNull('parent_term_id')->get();

        $result = $this->getChildTerms($roots);
        return $result;
    }

    private function getChildTerms($terms, $nest = 0)
    {
        $result = [];

        foreach ($terms as $term) {
            $childTerms = null;

            if (!$term->child_terms->isEmpty()){
                $childTerms = $this->getChildTerms($term->child_terms, $nest + 1);
            }

            $item = [
                'id'          => $term->id,
                'term'        => $term->name,
                'nest'        => $nest,
                'child_terms' => $childTerms ?? [],
            ];

            $item['prefix_term'] = $this->addPrefix($term->name, $nest);

            $result[] = $item;
        }

        return $result;
    }

    /**
     * @param string $taxonomyName
     * @return array
     */
    public function getFlat(string $taxonomyName)
    {
        // use nested function to ensure correct grouping
        $nested = $this->getNested($taxonomyName);

        $result = [];

        // flatten one by one
        foreach ($nested as $parent) {
            $this->getFlatChildren($parent, $result);
        }

        return $result;
    }

    private function getFlatChildren($parent, &$result)
    {
        $result[] = [
            'id'          => $parent['id'],
            'term'        => $parent['term'],
            'nest'        => $parent['nest'],
            'prefix_term' => $parent['prefix_term'],
        ];

        if (!empty($parent['child_terms'])) {
            foreach ($parent['child_terms'] as $child) {
                $this->getFlatChildren($child, $result);
            }
        }
    }

    private function addPrefix($name, $count, $prefix = '-')
    {
        $str = '';
        while ($count > 0) {
            $str .= $prefix;
            $count--;
        }

        if (!empty($str)) {
            $str .= ' ';
        }

        return $str.$name;
    }

    private function getParentCount($term)
    {
        $count = 0;
        while ($term->parent_term) {
            $count++;
            $term = $term->parent_term;
        }

        return $count;
    }

    /**
     * @param string $postType
     * @return array
     */
    public function getByPostType($postType = 'post') {
        foreach (config("cms.term.post-type-taxonomies." . $postType, []) as $taxonomy) {
            $taxonomies[] = [
                'name' => $taxonomy,
                'title' => ucwords(\Illuminate\Support\Pluralizer::plural(config('cms.term.taxonomies.' . $taxonomy . '.title'))),
                'terms' => $this->getNested($taxonomy)
            ];
        }
        return $taxonomies;
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

    private function storeMeta($term, $key, $value, $serialize = false)
    {
        if (is_array($value)) {
            if ($serialize) {
                $value = $this->serialize($value);
                return $term->term_metas()->create([
                    'key' => $key,
                    'value' => $value,
                    'is_serialized' => $serialize,
                ]);
            } else {
                $saved = [];
                foreach ($value as $itemValue) {
                    $saved[] = $term->term_metas()->create([
                        'key' => $key,
                        'value' => $itemValue,
                        'is_serialized' => $serialize,
                    ]);
                }
                return $saved;
            }
        } else {
            return $term->term_metas()->create([
                'key' => $key,
                'value' => $value,
                'is_serialized' => false,
            ]);
        }
    }

    private function hydrateTerm($term)
    {
        if (!is_object($term) && !($term instanceof Term)) {
            return $this->term->find($term);
        }
        return $term;
    }

    /**
     * @param Term|integer $term
     * @param string $key
     * @param mixed $value
     * @param boolean $serialize
     * @return mixed
     */
    public function setMeta($term, $key, $value, $serialize = false)
    {
        $term = $this->hydrateTerm($term);
        $existing = $term->term_metas->where('key', $key);

        if ($existing->count() > 1) {
            foreach ($existing as $deleteExist) {
                $deleteExist->delete();
            }
            $this->storeMeta($term, $key, $value, $serialize);
        } else {
            $existing = $existing->first();//get first value if not array
            if ($existing) {
                if (is_array($value)) {
                    $existing->delete();
                    return $this->storeMeta($term, $key, $value, $serialize);
                } else {
                    $existing->value = $value;
                    $existing->save();
                    return $existing;
                }
            } else {
                return $this->storeMeta($term, $key, $value, $serialize);
            }
        }
    }

    /**
     * @param Term|integer $term
     * @param string $key
     * @return mixed
     */
    public function getMeta($term, $key)
    {
        if (!$term) return null;

        $term = $this->hydrateTerm($term);
        $meta = $term->term_metas->where('key', $key);
        
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

    /**
     * @param array<string, string> $termData
     * @param array<string, string| \Illuminate\Http\UploadedFile> $metas
     * @return boolean|\App\Models\Term
     */
    public function storeTermWithMeta($termData, $metas) {
        if(!@$termData['taxonomy_name'] || !@$termData['term_name']) {
            throw new \Exception('invalid $termData');
        }

        \DB::beginTransaction();
        try {
            $term = $this->createTerm($termData['taxonomy_name'], $termData['term_name'], @$termData['parent_term_id']);
            
            if($metas) {
                foreach ($metas as $key => $value) {
                    if (!$value)
                        continue;
    
                    if (is_object($value) && $value instanceof \Illuminate\Http\UploadedFile) {
                        $metaImage = $this->imageStorage->uploadImage($value, [], 'term/', TRUE);
    
                        if (!empty($metaImage)) {
                            $this->setMeta($term, $key, $metaImage, false);
                        }
                    } else {
                        $this->setMeta($term, $key, $value, is_array($value));
                    }
                }
            }

            \Db::commit();
            return $term;
        } catch (\Throwable $th) {
            \DB::rollBack();
            \Log::error($th);
            return false;
        }
    }

    /**
     * @param array<string, string> $updateTermData
     * @param array<string, string| \Illuminate\Http\UploadedFile> $metas
     * @return boolean|\App\Models\Term
     */
    public function updateTermWithMeta($updateTermData, $metas) {
        if(!@$updateTermData['term_id']) {
            throw new \Exception('invalid $updateTermData');
        }

        \DB::beginTransaction();
        try {
            $term = $this->updateTerm($updateTermData['term_id'], @$updateTermData['term_name'], @$updateTermData['parent_term_id']);
            
            if($metas) {
                foreach ($metas as $key => $value) {
                    if (!$value)
                        continue;
    
                    if (is_object($value) && $value instanceof \Illuminate\Http\UploadedFile) {
                        $metaImage = $this->imageStorage->uploadImage($value, [], 'term/', TRUE);
                        $savedFile = $this->getMeta($updateTermData['term_id'], $key);
    
                        if (!empty($savedFile) && $metaImage) {
                            $this->imageStorage->deleteImage($savedFile, 'term/', TRUE);
                        }

                        if (!empty($metaImage)) {
                            $this->setMeta($term, $key, $metaImage, false);
                        }
                    } else {
                        $this->setMeta($term, $key, $value, is_array($value));
                    }
                }
            }

            \Db::commit();
            return $term;
        } catch (\Throwable $th) {
            \DB::rollBack();
            \Log::error($th);
            return false;
        }
    }
}
