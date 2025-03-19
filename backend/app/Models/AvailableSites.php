<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class AvailableSites extends Model
{
    use HasFactory, HasApiTokens;

    public $table = 'available_sites';

    protected $fillable = [
        'name',
        'base_url',
        'is_cors_allowed',
        'token',
    ];
}
