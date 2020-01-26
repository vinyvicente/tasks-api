<?php

namespace App\UI\RestAPI\Controllers;

use App\Domain\Task\Events\TaskListed;
use Illuminate\Http\Request;

class ListTasks extends Controller
{
    public function __invoke(Request $request)
    {
        return event(new TaskListed($request));
    }
}
