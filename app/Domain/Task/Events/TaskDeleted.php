<?php

namespace App\Domain\Task\Events;

use App\Domain\Task\Events\Common\Dependency;
use App\Domain\Task\ValueObjects\Task;
use App\Infrastructure\Abstracts\Event;

class TaskDeleted extends Event
{
    use Dependency;

    public function getValueObject(): Task
    {
        return new Task(
            $this->user->id,
            '',
            '',
            $this->request->get('id')
        );
    }
}
