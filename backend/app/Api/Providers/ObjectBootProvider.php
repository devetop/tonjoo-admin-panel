<?php

namespace App\Api\Providers;

use App\Api\Facades\ApiRouteFacade;
use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;

class ObjectBootProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        \Eventy::addAction('cms.backend', function () {
            ApiRouteFacade::cmsBuild();
        });

        /**
         * Core Capabilities
         */
        // Option capability
        add_capability('Option', 'option');
        add_capability('General Option', 'general-option', 'option');

        // User capability
        add_capability('User', 'user');
        add_capability('List User', 'list-user', 'user');
        add_capability('Add User', 'add-user', 'user');
        add_capability('Edit User', 'edit-user', 'user');
        add_capability('Delete User', 'delete-user', 'user');
        add_capability('Add User Role', 'add-user-role', 'user');
        add_capability('Remove User Role', 'remove-user-role', 'user');

        // Role capability
        add_capability('Role', 'role');
        add_capability('List Role', 'list-role', 'role');
        add_capability('Add Role', 'add-role', 'role');
        add_capability('Edit Role', 'edit-role', 'role');
        add_capability('Delete Role', 'delete-role', 'role');
    }
}
