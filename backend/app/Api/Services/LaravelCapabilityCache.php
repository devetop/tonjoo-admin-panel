<?php

namespace App\Api\Services;

use App\Api\Contracts\CapabilityCacheInterface;
use Illuminate\Support\Str;

class LaravelCapabilityCache implements CapabilityCacheInterface
{
    const CACHE_KEY = 'cms.capability';

    private function getCache()
    {
        if (\Cache::has(self::CACHE_KEY)) {
            return \Cache::get(self::CACHE_KEY);
        }

        return [];
    }

    private function getCapabilityKey($capabilityId, $args = [])
    {
        $argStr = '';
        if ($args) {
            $argStr = '.'.implode('.', $args);
        }

        return $capabilityId.$argStr;
    }

    public function put($userId, $capabilityId, $args, $capable, $table = 'users')
    {
        $cache = $this->getCache();
        $capabilityKey = $this->getCapabilityKey($capabilityId, $args);
        $cache[$table.'.'.$userId][$capabilityKey] = $capable;
        \Cache::put(self::CACHE_KEY, $cache, 1440);
    }

    public function has($userId, $capabilityId, $args = [], $table = 'users')
    {
        $cache = $this->getCache();
        $capabilityKey = $this->getCapabilityKey($capabilityId, $args);

        return isset($cache[$table.'.'.$userId][$capabilityKey]);
    }

    public function get($userId, $capabilityId, $args = [], $table = 'users')
    {
        $cache = $this->getCache();
        $capabilityKey = $this->getCapabilityKey($capabilityId, $args);

        return $cache[$table.'.'.$userId][$capabilityKey];
    }

    public function flushUser($userIdList, $table = 'users')
    {
        $cache = $this->getCache();
        if (! is_array($userIdList)) {
            $userIdList = [$userIdList];
        }
        foreach ($userIdList as $userId) {
            unset($cache[$table.'.'.$userId]);
        }
        \Cache::put(self::CACHE_KEY, $cache, 1440);
    }

    public function flushCapability($capabilityId)
    {
        $cache = $this->getCache();
        $context = $this->parseContext($capabilityId);
        foreach ($cache as $key => &$capabilities) {
            if ($context) {
                unset($cache[$key][$context]);
            }
            foreach ($capabilities as $capability => $value) {
                if (Str::startsWith($capability, $capabilityId)) {
                    unset($cache[$key][$capability]);
                }
            }
        }
        \Cache::put(self::CACHE_KEY, $cache, 1440);
    }

    private function parseContext($capabilityId)
    {
        $idSplit = explode('.', $capabilityId);
        $context = false;
        if (count($idSplit) > 1) {
            $context = $idSplit[0];
        }

        return $context;
    }
}
