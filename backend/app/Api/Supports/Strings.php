<?php

namespace App\Api\Supports;

use Illuminate\Support\Str;

class Strings
{
    public function isValidSlug($string)
    {
        return preg_match('/^[a-z][-a-z0-9]*$/', $string);
    }

    public function slug($string, $separator = '-', $language = 'en')
    {
        $string = basename($string);
        $string = strtolower(
            preg_replace([
                '/([a-z\d])([A-Z])/', '/([^_])([A-Z][a-z])/'], '$1-$2', $string));

        return Str::slug($string, $separator, $language);
    }

    public function slugToCamel($slug, $capitalizeFirstCharacter = false)
    {
        $str = str_replace(' ', '', ucwords(str_replace('-', ' ', $slug)));

        if (!$capitalizeFirstCharacter) {
            $str[0] = strtolower($str[0]);
        }

        return $str;
    }

    public function slugToTitle($slug)
    {
        $str = ucwords(str_replace('-', ' ', $slug));
        $str[0] = strtoupper($str[0]);
        return $str;
    }

    public function snakeToCamel($snake)
    {
        return str_replace('_', '', ucwords($snake, '_'));
    }

    public function startsWith($haystack, $needle)
    {
        $length = strlen($needle);
        return (substr($haystack, 0, $length) === $needle);
    }

    public function endsWith($haystack, $needle)
    {
        $length = strlen($needle);
        if ($length == 0) {
            return true;
        }

        return (substr($haystack, -$length) === $needle);
    }

    public function contains($haystack, $needle)
    {
        if (strpos($haystack, $needle) !== false) {
            return true;
        }
        return false;
    }
}
