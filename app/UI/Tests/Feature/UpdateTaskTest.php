<?php

namespace App\UI\Tests\Feature;

use App\UI\Tests\Feature\Common\Authenticate;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Tests\TestCase;

class UpdateTaskTest extends TestCase
{
    use DatabaseMigrations;
    use Authenticate;

    private function createTask()
    {
        $this->post(route('api.task.create'), ['title' => 'My new title'], $this->headers($this->getToken()));
    }

    public function testUpdateTask()
    {
        $this->createTask();

        $this->patch(route('api.task.patch', ['id' => 1]), ['title' => 'My new title 2', 'due_date' => '2020-02-02', 'description' => 'updating texts', 'done' => true], $this->headers($this->getToken()))
            ->seeJson(['message' => 'UPDATED']);
    }
}
