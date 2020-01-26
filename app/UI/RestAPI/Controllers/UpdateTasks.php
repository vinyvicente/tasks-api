<?php

namespace App\UI\RestAPI\Controllers;

use App\Domain\Task\Events\TaskUpdated;
use Illuminate\Http\Request;

class UpdateTasks extends Controller
{
    public function __invoke(string $id, Request $request)
    {
        $request->request->add(['id' => $id]);

        $this->validate($request, [
            'id' => 'required|string|exists:tasks',
            'title' => 'string',
            'description' => 'string',
            'done' => 'bool',
        ]);

        return event(new TaskUpdated($request));
    }
}
