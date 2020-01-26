<?php

namespace App\Domain\Task\Services;

use App\Domain\Task\ValueObjects\Task;
use App\Domain\Task\Entities\Task as TaskEntity;
use App\Domain\Task\ValueObjects\TaskFilter;
use Illuminate\Http\JsonResponse;

class TaskService
{
    public function create(Task $task): JsonResponse
    {
        return response()->json(['task' => TaskEntity::create($task->getData()), 'message' => 'CREATED'], 201);
    }

    public function update(int $id, Task $task): JsonResponse
    {
        $taskEntity = TaskEntity::find($id);
        $taskEntity->update($task->getUpdatedData());

        return response()->json(['task' => $taskEntity, 'message' => 'UPDATED'], 201);
    }

    public function remove(int $id): JsonResponse
    {
        $taskEntity = TaskEntity::find($id);
        $taskEntity->delete();

        return response()->json(['message' => 'DELETED'], 202);
    }

    public function taskList(TaskFilter $filter)
    {
        return response()->json(['data' => TaskEntity::filterByUserIdAndDate($filter)->get()]);
    }
}
