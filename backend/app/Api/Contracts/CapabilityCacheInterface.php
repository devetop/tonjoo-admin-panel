<?php

namespace App\Api\Contracts;

interface CapabilityCacheInterface
{
    public function put($userId, $capabilityId, $args, $capable, $table = 'users');

    public function has($userId, $capabilityId, $args = [], $table = 'users');

    public function get($userId, $capabilityId, $args = [], $table = 'users');

    public function flushUser($userId, $table = 'users');

    public function flushCapability($capabilityId);
}
