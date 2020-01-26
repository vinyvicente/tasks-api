<?php

namespace App\Domain\User\Listeners;

use App\Domain\User\Events\UserRegistered;
use App\Domain\User\Listeners\Common\Dependency;
use Illuminate\Http\JsonResponse;

class UserRegisteredEventHandler
{
    use Dependency;

    public function handle(UserRegistered $event): JsonResponse
    {
        return $this->service->store($event->getValueObject());
    }
}
