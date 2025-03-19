<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Taxonomy extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
    ];

    public function terms()
    {
        return $this->hasMany(Term::class);
    }
}

