<?php

namespace App\Domain\User\Events;

use App\Domain\User\Events\Common\RequestDependency;
use App\Domain\User\ValueObjects\User;
use App\Infrastructure\Abstracts\Event;

class UserRegistered extends Event
{
    use RequestDependency;

    public function getValueObject(): User
    {
        return new User(
            $this->request->get('email'),
            $this->request->get('password'),
            $this->request->get('name')
        );
    }
}
