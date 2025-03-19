<?php

namespace App\Api\Services;

use App\Api\Contracts\UserAuthorizationInterface;

class UserAuthorizationService implements UserAuthorizationInterface
{
    public function has_capability($capabilities)
    {
        return has_capability($capabilities);
    }

    public function authorize($capabilities)
    {
        if ($this->has_capability($capabilities) == false) {
            abort(403, 'Does not have any access');
        }
    }
}
