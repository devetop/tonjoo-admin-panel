<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    protected $table = 'role';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    public function getPermissionCollectionAttribute($v)
    {
        if (! $this->permissions)
            return collect([]);

        return $this->permissions->map(function ($item) { return $item->permission; });
    }

    /**
     * @param $permissions permission array with context context.permission
     */
    public function setPermissions($value)
    {
        $newPermissions = collect($value)->diff($this->permission_collection);
        $removedPermissions = $this->permission_collection->toBase()->diff($value);

        $this->permissions()
             ->whereIn('permission', $removedPermissions)
             ->each(function ($model) { $model->delete(); });

        $addedPermissions = $newPermissions->map(function ($item) {
                 return [
                     'permission' => $item,
                 ];
             });

        $this->permissions()
             ->createMany($addedPermissions->all());
    }

    public function scopeOfSearch($query, $name)
    {
        return $query->where('name', 'like', "%$name%");
    }

    public function scopeOfFilters($query, $filters)
    {
        return $query->orderBy($filters['sortBy'], $filters['orderBy']);
    }

    public function permissions()
    {
        return $this->hasMany(RolePermission::class, 'role_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'role_user', 'role_id', 'user_id');
    }

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($model) {
            //cascade delete role permission
            $model->permissions()->each(function ($item) {
                $item->delete();
            });
        });
    }
}
