<?php

namespace App\Api\Contracts;

interface OptionInterface
{
    public function get($key, $default = false);
    public function getMany(array $keyDefaultPairs);
    public function set($key, $value);
}

