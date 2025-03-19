<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class RoleUser extends Pivot
{
    //
    protected $table = 'role_user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_id',
        'user_id',
    ];

    public function role()
    {
        return $this->hasOne(Role::class, 'id', 'role_id');
    }

    public function user()
    {
        return $this->belongTo(User::class, 'user_id');
    }

    public function role_permision()
    {
        return $this->hasMany(RolePermission::class, 'role_id', 'role_id');
    }

    public static function boot()
    {
        parent::boot();

        static::saved(function ($model) {
            //publish event role added
            \CapabilityCache::flushUser($model->user_id);
        });

        static::deleted(function ($model) {
            //publish event role removed
            \CapabilityCache::flushUser($model->user_id);
        });
    }
}
