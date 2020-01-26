<?php

namespace App\UI\RestAPI\Controllers;

use App\Domain\Task\Events\TaskCreated;
use Illuminate\Http\Request;

class CreateTasks extends Controller
{
    public function __invoke(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255|min:3',
            'description' => 'string',
            'done' => 'bool',
        ]);

        return event(new TaskCreated($request));
    }
}
