<?php

namespace App\Api\Services;

use App\Api\Contracts\OptionInterface;
use App\Models\Option;

class OptionEloquent implements OptionInterface
{
    private $model;
    private $cache;

    public function __construct(Option $model)
    {
        $this->model = $model;
        $this->cache = collect();
    }

    /**
     * @param mixed $key
     * @param boolean $default
     * @return mixed
     */
    public function get($key, $default = false)
    {
        if ($this->cache->has($key)) {
            return $this->cache->get($key);
        }

        try {
            $value = $this->model->where('name', $key)->first()?->value ?? $default;
        } catch (\Throwable $th) {
            $value = $default;
        }

        if (is_array($value)) {
            $this->cache->put($key, $value);
            return $value;
        }

        // try to unserialize by default
        $tryUnserialize = @unserialize($value);
        if ($tryUnserialize !== false) {
            $this->cache->put($key, $tryUnserialize);
            return $tryUnserialize;
        }

        $this->cache->put($key, $value);
        return $value;
    }

    public function getMany(array $keyDefaultPairs)
    {
        $result = [];
        foreach ($keyDefaultPairs as $key => $default) {
            if (is_numeric($key)) {
                $result[$default] = $this->get($default);
            } else {
                $result[$key] = $this->get($key, $default);
            }
        }
        return $result;
    }

    /**
     * @param mixed $key
     * @param mixed $value
     * @return mixed
     */
    public function set($key, $value)
    {
        //automatically serialize if array
        if (is_array($value)) {
            $value = serialize($value);
        }

        //purge cache
        $this->cache = collect();

        return $this->model->updateOrCreate([
            'name' => $key,
        ], [
            'value' => $value,
        ]);
    }
}
