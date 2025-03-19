<?php

namespace App\Models;

use App\Http\Enums\PostStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Post extends Model
{
    use SoftDeletes, HasSlug, HasFactory;

    protected $table = 'posts';

    protected $fillable = [
        'id',
        'title',
        'slug',
        'content',
        'type',
        'author_id',
        'status',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const IMAGE_FOLDER = 'post/';
    public const GET_LIST = [
        'id',
        'title',
        'slug',
        'content',
        'type',
        'author_id',
        'status',
        'updated_at',

    ];
    public const GET_DETAIL = [
        'id',
        'title',
        'slug',
        'content',
        'type',
        'author_id',
        'status',
        'updated_at',
    ];

    public function scopeOfList($query)
    {
        return $query->select(Post::GET_LIST);
    }

    public function scopeOfDetail($query)
    {
        return $query->select(Post::GET_DETAIL);
    }

    public function scopeOfSearch($query, $title)
    {
        return $query->where('title', 'like', "%$title%");
    }

    public function scopeOfDraft($query)
    {
        return $query->where('status', PostStatus::DRAFT);
    }

    public function scopeOfFilters($query, $filters)
    {
        return $query->orderBy($filters['sortBy'], $filters['orderBy']);
    }

    public function scopeOfSlug($query, $slug)
    {
        return $query->where('slug', $slug);
    }

    public function scopeStatusPublished($query)
    {
        return $query->where('status', PostStatus::PUBLISH);
    }

    public function scopeOfType($query, $type)
    {
        if (is_array($type)) {
            return $query->whereIn('type', $type);
        } else {
            return $query->where('type', $type);
        }
    }

    public function scopeTypePost($query)
    {
        return $query->ofType('post');
    }

    public function scopeTypePage($query)
    {
        return $query->ofType('page');
    }

    public function scopeTypeProduct($query)
    {
        return $query->ofType('product');
    }

    public function getDesktopImageUrlAttribute()
    {
        return \ImageStorage::getUrl(self::IMAGE_FOLDER, $this->featured_image);
    }

    public function getMobileImageUrlAttribute()
    {
        return \ImageStorage::getUrl(self::IMAGE_FOLDER, $this->mobile_image);
    }

    public function getThumbnailImageUrlAttribute()
    {
        return \ImageStorage::getUrl(self::IMAGE_FOLDER, 'thumbnail-' . $this->featured_image);
    }

    public function getThumbnailMobileImageUrlAttribute()
    {
        return \ImageStorage::getUrl(self::IMAGE_FOLDER, 'thumbnail-' . $this->mobile_image);
    }

    public function getSubTitleAttribute()
    {
        return \Post::getMeta($this, 'sub_title');
    }

    public function getFeaturedImageAttribute()
    {
        $featuredImage = \Post::getMeta($this, 'featured_image') ?: '';

        return $featuredImage ? \ImageStorage::getUrl($this->type . '/', $featuredImage) : asset('assets/frontend/assets/img/post-bg.jpg');
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function post_metas()
    {
        return $this->hasMany(Postmeta::class, 'post_id');
    }

    public function terms()
    {
        return $this->belongsToMany(
            Term::class,
            'term_relationships'
        );
    }

    public function comments()
    {
        return 999;
    }
}
