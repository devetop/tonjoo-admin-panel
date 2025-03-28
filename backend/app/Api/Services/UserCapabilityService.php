<?php

namespace App\Api\Services;

use App\Api\Contracts\CapabilityCacheInterface;
use App\Api\Contracts\RoleCapabilityInterface;
use App\Api\Contracts\UserCapabilityInterface;
use App\Api\Supports\Strings;
use App\Models\User;

class UserCapabilityService implements UserCapabilityInterface
{
    private $user;
    private $roleCapability;
    private $cache;
    private $strings;

    public function __construct(
        User $user,
        RoleCapabilityInterface $roleCapability,
        CapabilityCacheInterface $cache,
        Strings $strings
    ) {
        $this->user = $user;
        $this->roleCapability = $roleCapability;
        $this->cache = $cache;
        $this->strings = $strings;
    }

    public function userHasCapability($userId, $capabilityId, $args = [])
    {
        return $this->userHasContextCapability($userId, 'master', $capabilityId, $args);
    }

    private function userHasContext($user, $context)
    {
        if ($this->cache->has($user->id, $context, [], $user->getTable())) {
            return $this->cache->get($user->id, $context, [], $user->getTable());
        }

        $roles = $user->roles;
        $hasPermission = false;
        foreach ($roles as $role) {
            $permissions = $role->permission_collection;
            foreach ($permissions as $permission) {
                if ($this->strings->startsWith($permission, $context.'.')) {
                    $hasPermission = true;
                }
                if ($hasPermission) break;
            }
            if ($hasPermission) break;
        }

        $this->cache->put($user->id, $context, [], $hasPermission, $user->getTable());

        return $hasPermission;
    }

    public function userHasContextCapability($userId, $context, $capabilityId, $args = [])
    {
        $capabilityKey = $context.'.'.$capabilityId;

        if ($this->cache->has($userId, $capabilityKey, $args, $this->user->getTable())) {
            return $this->cache->get($userId, $capabilityKey, $args, $this->user->getTable());
        }

        $user = $this->user->find($userId);
        $capable = false;

        foreach ($user->roles as $role) {
            $permissions = $role->permission_collection;
            $hasPermission = $permissions->contains($capabilityKey);
            if ($hasPermission) {
                $capability = $this->roleCapability->getWithContext($context, $capabilityId);
                if ($capability['callback']) {
                    $callback = get_callback($capability['callback']);
                    $capable = call_user_func_array($callback, $args);
                } else {
                    $capable = true;
                }
                break;
            }
        }
        $this->cache->put($userId, $capabilityKey, $args, $capable, $this->user->getTable());

        return $capable;
    }

    //will only return false if:
    //capabilities is not empty
    //and user has no capability for any capability in parameter
    public function hasAny($capabilities = [])
    {
        return $this->hasAnyInContext('master', $capabilities);
    }

    public function hasAnyInContext($context, $capabilities = [])
    {
        //format
        //(['some-capability', 'some-special-capability' => [1, 2, 3]])
        if (empty($capabilities)) {
            $capabilities = [];
        }
        if (! is_array($capabilities) && ! is_assoc_array($capabilities)) {
            $capabilities = [$capabilities];
        }
        //default true when $capabilities is empty
        $capable = true;

        foreach ($capabilities as $key => $capability) {
            if (is_array($capability)) {
                $capable = $this->hasContextCapability($context, $key, $capability);
            } else {
                $capable = $this->hasContextCapability($context, $capability);
            }
            //if $capabilities is not empty
            //and user has capability for at least one, then pass
            if ($capable) break;
        }

        return $capable;
    }

    public function hasCapability($capabilityId, $args = [])
    {
        return $this->hasContextCapability('master', $capabilityId, $args);
    }

    public function hasContextCapability($context, $capabilityId, $args = [])
    {
        $user = $this->user;
        $userId = $user->id;

        return $this->userHasContextCapability($userId, $context, $capabilityId, $args);
    }

    public function hasContext($context)
    {
        return $this->userHasContext($this->user, $context);
    }

    public function getUserCapabilities($userId)
    {
        $user = $this->user->find($userId);
        if (! $user) return [];

        $capabilities = [];

        foreach ($user->roles as $role) {
            $permissions = $role->permissions;
            foreach ($permissions as $permission) {
                [$context, $capability] = explode('.', $permission->permission);

                //if explode only yields one value, use it as capability
                //and set context to default: master
                if (! $capability) {
                    $capability = $context;
                    $context = 'master';
                }

                $capabilities[$context][] = $capability;
            }
        }

        return $capabilities;
    }

    public function getUserGroupedCapabilities($userId)
    {
        $capabilities = $this->getUserCapabilities($userId);

        $grouped = [];

        foreach ($capabilities as $context => $userCapabilities) {
            $permissions = $this->roleCapability->allInContext($context);
            $groupKeys = array_keys($permissions);
            $groupedUserCapabilities = [];

            foreach ($groupKeys as $groupKey) {
                $groupPermission = $permissions[$groupKey];
                $groupCapabilities = array_keys($groupPermission['capabilities']);

                $intersection = array_intersect($userCapabilities, $groupCapabilities);

                $groupedUserCapabilities[$groupKey] = array_values($intersection);
            }

            $grouped[$context] = $groupedUserCapabilities; //grouping result
        }
        foreach ($grouped as $context => $groupedItems) {
            if (! $groupedItems)
                unset($grouped[$context]);
        }

        return $grouped;
    }
}
