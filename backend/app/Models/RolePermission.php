<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RolePermission extends Model
{
    //
    protected $table = 'role_permissions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_id',
        'permission',
    ];

    public static function boot()
    {
        parent::boot();

        static::saved(function ($model) {
            \CapabilityCache::flushCapability($model->permission);
        });

        static::deleted(function ($model) {
            \CapabilityCache::flushCapability($model->permission);
        });
    }
}
