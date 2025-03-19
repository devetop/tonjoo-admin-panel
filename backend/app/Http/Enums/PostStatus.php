<?php

namespace App\Http\Enums;

use App\Contracts\HasMappingInterface;
use App\Traits\HasMappingTrait;

enum PostStatus : string implements HasMappingInterface
{
    use HasMappingTrait;

    case PUBLISH = 'publish';
    case DRAFT = 'draft';

    public function title() : string {
        return match ($this->value) {
            (self::PUBLISH)->value => 'Publish',
            (self::DRAFT)->value => 'Draft',
            default => ''
        };
    }
}
