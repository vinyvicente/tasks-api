<?php

namespace App\Domain\Task\Listeners;

use App\Domain\Task\Events\TaskUpdated;
use App\Domain\Task\Services\TaskService;
use Illuminate\Http\JsonResponse;

class TaskUpdatedEventHandler
{
    private TaskService $service;

    public function __construct(TaskService $service)
    {
        $this->service = $service;
    }

    public function handle(TaskUpdated $event): JsonResponse
    {
        return $this->service->update($event->getIncrement(), $event->getValueObject());
    }
}
