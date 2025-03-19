<?php

namespace App\Api\Contracts;

interface UserAuthorizationInterface
{
    public function authorize($capabilities);
}
