<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Termmeta extends Model
{
    use HasFactory;

    protected $table = 'term_metas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'term_id',
        'key',
        'value',
        'is_serialized',
    ];

    protected $casts = [
        'is_serialized' => 'boolean',
    ];
}
