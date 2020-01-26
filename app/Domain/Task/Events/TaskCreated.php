<?php

namespace App\Domain\Task\Events;

use App\Domain\Task\Events\Common\Dependency;
use App\Domain\Task\ValueObjects\Task;
use App\Infrastructure\Abstracts\Event;
use Carbon\Carbon;

class TaskCreated extends Event
{
    use Dependency;

    public function getValueObject(): Task
    {
        return new Task(
            $this->user->id,
            $this->request->get('title', ''),
            $this->request->get('description', ''),
            null,
            $this->request->get('done', ''),
            $this->request->get('due_date', Carbon::now()->format('Y-m-d')),
        );
    }
}
