<?php

namespace App\Domain\Task\Listeners;

use App\Domain\Task\Events\TaskListed;
use App\Domain\Task\Services\TaskService;
use Illuminate\Http\JsonResponse;

class TaskListedEventHandler
{
    private TaskService $service;

    public function __construct(TaskService $service)
    {
        $this->service = $service;
    }

    public function handle(TaskListed $event): JsonResponse
    {
        return $this->service->taskList($event->getValueObject());
    }
}
