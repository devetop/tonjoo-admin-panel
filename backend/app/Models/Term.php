<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Term extends Model
{
    use SoftDeletes, HasSlug;

    protected $fillable = [
        'taxonomy_id',
        'name',
        'parent_term_id',
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function parent_term()
    {
        return $this->belongsTo(Term::class, 'parent_term_id');
    }

    public function child_terms()
    {
        return $this->hasMany(Term::class, 'parent_term_id');
    }

    public function posts()
    {
        return $this->belongsToMany(
            Post::class,
            'term_relationships'
        );
    }

    public function taxonomy()
    {
        return $this->belongsTo(Taxonomy::class);
    }

    public function getIsDeletableAttribute()
    {
        //doesnt have child
        if (!$this->child_terms->isEmpty()) return false;

        //and doesnt have post
        if (!$this->posts->isEmpty()) return false;

        return true;
    }

    public function term_metas()
    {
        return $this->hasMany(Termmeta::class,'term_id');
    }
}

