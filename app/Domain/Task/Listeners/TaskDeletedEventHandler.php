<?php

namespace App\Domain\Task\Listeners;

use App\Domain\Task\Events\TaskDeleted;
use App\Domain\Task\Services\TaskService;
use Illuminate\Http\JsonResponse;

class TaskDeletedEventHandler
{
    private TaskService $service;

    public function __construct(TaskService $service)
    {
        $this->service = $service;
    }

    public function handle(TaskDeleted $event): JsonResponse
    {
        return $this->service->remove($event->getValueObject()->getId());
    }
}
