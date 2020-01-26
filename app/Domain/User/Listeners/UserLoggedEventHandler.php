<?php

namespace App\Domain\User\Listeners;

use App\Domain\User\Events\UserLogged;
use App\Domain\User\Listeners\Common\Dependency;
use Illuminate\Http\JsonResponse;

class UserLoggedEventHandler
{
    use Dependency;

    public function handle(UserLogged $event): JsonResponse
    {
        return $this->service->login($event->getValueObject());
    }
}
