<?php

namespace App\Api\Services;

trait FillsDefaultFromRequest
{
    protected function fillDefaults($data, $field)
    {
        if (!$data) {
            $data = \Arr::get(request()->all(), $field);
        }
        return $data;
    }

    protected function requestAsDefault($data, $field)
    {
        $request = \Arr::get(request()->all(), $field);
        if ($request) {
            return $request;
        }
        return $data;
    }
}

