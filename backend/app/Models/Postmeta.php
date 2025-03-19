<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Postmeta extends Model
{
    //
    protected $table = 'post_metas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'post_id',
        'key',
        'value',
        'is_serialized',
    ];

    protected $casts = [
        'is_serialized' => 'boolean',
    ];
}
