<?php

namespace App\Api\Tools\Models;

use Illuminate\Database\Eloquent\Model;

class Cron extends Model
{
    public $fillable = [
        'name',
        'time',
    ];
}
