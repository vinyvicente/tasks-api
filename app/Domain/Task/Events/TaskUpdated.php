<?php

namespace App\Domain\Task\Events;

use App\Domain\Task\Events\Common\Dependency;
use App\Domain\Task\ValueObjects\Task;
use App\Infrastructure\Abstracts\Event;

class TaskUpdated extends Event
{
    use Dependency;

    public function getValueObject(): Task
    {
        return new Task(
            $this->user->id,
            $this->request->get('title', ''),
            $this->request->get('description', ''),
            $this->request->get('id'),
            $this->request->get('done', null),
            $this->request->get('due_date', ''),
        );
    }

    public function getIncrement(): int
    {
        return (int) $this->request->get('id');
    }
}
