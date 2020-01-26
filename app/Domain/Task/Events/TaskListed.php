<?php

namespace App\Domain\Task\Events;

use App\Domain\Task\Events\Common\Dependency;
use App\Domain\Task\ValueObjects\TaskFilter;
use App\Infrastructure\Abstracts\Event;
use Carbon\Carbon;

class TaskListed extends Event
{
    use Dependency;

    public function getValueObject(): TaskFilter
    {
        return new TaskFilter($this->user->id, $this->request->get('dueDate', Carbon::now()->format('Y-m-d')));
    }
}
