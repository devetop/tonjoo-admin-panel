<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $context = 'master';

        $permissions = get_capabilities();

        $permissionDatas = collect($permissions)
            ->map(function ($item, $key) {
                return collect(optional($item)['capabilities'])
                    ->prepend(null, $key)
                    ->keys();
            })
            ->flatten()
            ->map(fn ($item) => ['permission' => "{$context}.{$item}"])
            ->all();

        $user = app(User::class)->firstOrCreate([
            'email' => 'admin@mail.com',
        ], [
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => Hash::make('secret'),
        ]);

        //get or create default role by name Admin User
        $adminRole = Role::firstOrCreate([ 'name' => 'Admin User' ]);

        foreach ($permissionDatas as $permissionData) {
            $adminRole->permissions()
                      ->updateOrCreate($permissionData, []);
        }

        //if already attached then just skip it
        if (!$user->roles->contains($adminRole)) {
            $user->roles()->attach($adminRole);
        }

        echo "Set Admin User role for user = ".$user->email."\n";

        $user = app(User::class)->firstOrCreate([
            'email' => 'fed-user@mail.com',
        ], [
            'name' => 'Frontend Dashboard User',
            'password' => Hash::make('12341234'),
        ]);
        $fedUser = Role::firstOrCreate(['name' => 'Frontend Dashboard User']);
        $fedUser->permissions()->firstOrCreate(['permission' => 'dashboard.login-as-user']);
        $fedUser->permissions()->firstOrCreate(['permission' => 'dashboard.product-can-create-mine']);
        $fedUser->permissions()->firstOrCreate(['permission' => 'dashboard.product-can-view-mine']);
        $fedUser->permissions()->firstOrCreate(['permission' => 'dashboard.product-can-show-mine']);
        $fedUser->permissions()->firstOrCreate(['permission' => 'dashboard.product-can-update-mine']);
        $fedUser->permissions()->firstOrCreate(['permission' => 'dashboard.product-can-delete-mine']);
        if (!$user->roles->contains($fedUser)) {
            $user->roles()->attach($fedUser);
        }
        echo "Set Frontend Dashboard User role for user = ".$user->email."\n";

        $user = app(User::class)->firstOrCreate([
            'email' => 'fed-user2@mail.com',
        ], [
            'name' => 'Frontend Dashboard User 2',
            'password' => Hash::make('12341234'),
        ]);
        if (!$user->roles->contains($fedUser)) {
            $user->roles()->attach($fedUser);
        }
        echo "Set Frontend Dashboard User role for user = ".$user->email."\n";

        $user = app(User::class)->firstOrCreate([
            'email' => 'fed-admin@mail.com',
        ], [
            'name' => 'Frontend Dashboard Admin',
            'password' => Hash::make('12341234'),
        ]);
        $fedAdmin = Role::firstOrCreate(['name' => 'Frontend Dashboard Admin']);
        $fedAdmin->permissions()->firstOrCreate(['permission' => 'dashboard.login-as-admin']);
        $fedAdmin->permissions()->firstOrCreate(['permission' => 'dashboard.product-can-create']);
        $fedAdmin->permissions()->firstOrCreate(['permission' => 'dashboard.product-can-view-all']);
        $fedAdmin->permissions()->firstOrCreate(['permission' => 'dashboard.product-can-show-all']);
        $fedAdmin->permissions()->firstOrCreate(['permission' => 'dashboard.product-can-update-all']);
        $fedAdmin->permissions()->firstOrCreate(['permission' => 'dashboard.product-can-delete-all']);
        if (!$user->roles->contains($fedAdmin)) {
            $user->roles()->attach($fedAdmin);
        }
        echo "Set Frontend Dashboard Admin role for user = ".$user->email."\n";
    }
}
