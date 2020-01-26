<?php

namespace App\Domain\User\Listeners\Common;

use App\Domain\User\Services\UserService;

trait Dependency
{
    private UserService $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }
}
