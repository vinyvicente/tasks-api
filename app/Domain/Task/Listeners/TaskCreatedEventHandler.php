<?php

namespace App\Domain\Task\Listeners;

use App\Domain\Task\Events\TaskCreated;
use App\Domain\Task\Services\TaskService;
use Illuminate\Http\JsonResponse;

class TaskCreatedEventHandler
{
    private TaskService $service;

    public function __construct(TaskService $service)
    {
        $this->service = $service;
    }

    public function handle(TaskCreated $event): JsonResponse
    {
        return $this->service->create($event->getValueObject());
    }
}
