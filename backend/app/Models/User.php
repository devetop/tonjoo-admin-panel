<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Rackbeat\UIAvatars\HasAvatar;
use App\Notifications\ResetPasswordNotification;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes, HasFactory, HasAvatar, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAvatar($size = 64)
    {
        return $this->getGravatar($this->name, $size);
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    public function scopeOfSearch($query, $name)
    {
        return $query->where('name', 'like', "%$name%");
    }

    public function scopeOfFilters($query, $filters)
    {
        return $query->orderBy($filters['sortBy'], $filters['orderBy']);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id')->using(RoleUser::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'author_id', 'id');
    }

    public function oauth_provider()
    {
        return $this->hasOne(OAuthProvider::class, 'user_id', 'id');
    }

    public function uploaded()
    {
        return $this->morphMany(FileUpload::class, 'uploaderable');
    }

    public function sendPasswordResetNotification($token): void
    {
        if (request()->get('redirect_url')) {
            $url = request()->get('redirect_url').'?token='.$token.'&email='.request()->get('email');
        } elseif (request()->segment(1) == 'dashboard') {
            $url = request()->getSchemeAndHttpHost() . '/dashboard/password/reset/' . $token . '?email=' . request()->get('email');
        } else {
            $url = request()->getSchemeAndHttpHost() . '/password/reset/' . $token . '?email=' . request()->get('email');
        }
        
        $this->notify(new ResetPasswordNotification($url));
    }

    // permission mappings for FE
    public function getPermissionsAttribute()
    {
        $permissions = $this->roles->map(function($role) {
            return $role->permission_collection;
        })->flatten()->unique();

        $permissions = [
            'auth_admin' => $permissions->contains('dashboard.login-as-admin'),
            'auth_dashboard' => $permissions->contains('dashboard.login-as-dashboard'),

            // admin
            'product_menu'          => $permissions->contains('dashboard.product-can-view-all'),
            'product_add_button'    => $permissions->contains('dashboard.product-can-create'),
            'product_add_page'      => $permissions->contains('dashboard.product-can-create'),
            'product_list_page'     => $permissions->contains('dashboard.product-can-view-all'),
            'product_edit_page'     => $permissions->contains('dashboard.product-can-show-all'),

            // user
            'my_product_menu'       => $permissions->contains('dashboard.product-can-view-mine'),
            'my_product_add_button' => $permissions->contains('dashboard.product-can-create-mine'),
            'my_product_add_page'   => $permissions->contains('dashboard.product-can-create-mine'),
            'my_product_list_page'  => $permissions->contains('dashboard.product-can-view-mine'),
            'my_product_edit_page'  => $permissions->contains('dashboard.product-can-show-mine'),
        ];

        $filteredPermissions = [];
        foreach ($permissions as $key => $value) {
            if (!$value) {
                continue;
            }
            $filteredPermissions[$key] = $value;
        }
        return $filteredPermissions;
    }
}
