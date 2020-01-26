<?php

namespace App\UI\RestAPI\Controllers;

use App\Domain\Task\Events\TaskDeleted;
use Illuminate\Http\Request;

class DeleteTasks extends Controller
{
    public function __invoke(string $id, Request $request)
    {
        $request->request->add(['id' => $id]);

        $this->validate($request, [
            'id' => 'required|string|exists:tasks',
        ]);

        return event(new TaskDeleted($request));
    }
}
