<?php

namespace App\Http\Enums;

enum AvailableUploadPaths : string
{
    case IMAGES_PRODUCTS            = 'images/products';
    case IMAGES_PRODUCTS_SLIDERS    = 'images/products/sliders';
    case FILE_EXAMPLE               = 'file/example';
    case PRIVATE_FILE_EXAMPLE       = 'private/file/example';

    public static function all_values() {
        return array_map(fn($item) => $item->value, self::cases());
    }
}
