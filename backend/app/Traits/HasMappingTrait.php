<?php

namespace App\Traits;

trait HasMappingTrait
{
  public static function all()
  {
    return array_map(
      fn(self $enum) => $enum->value,
      self::cases()
    );
  }

  public static function allValues()
  {
    return array_map(
      fn($item) => (string) $item,
      self::all()
    );
  }

  public static function selectItems()
  {
    $all = self::all();
    $result = [];

    foreach ($all as $item) {
      $result[$item] = self::tryFrom($item)->title();
    }

    return $result;
  }

  public static function implode($char = ',')
  {
    return implode($char, self::allValues());
  }
}