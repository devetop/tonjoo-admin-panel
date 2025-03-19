<?php 

namespace App\Contracts;

interface HasMappingInterface
{
  public static function all();

  public static function allValues();

  public static function selectItems();

  public static function implode($char = ',');
}