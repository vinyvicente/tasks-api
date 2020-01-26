<?php

namespace App\UI\Tests\Feature;

use App\UI\Tests\Feature\Common\Authenticate;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Tests\TestCase;

class DeleteTaskTest extends TestCase
{
    use DatabaseMigrations;
    use Authenticate;

    private function createTask()
    {
        $this->post(route('api.task.create'), ['title' => 'My new title'], $this->headers($this->getToken()));
    }

    public function testDeleteTask()
    {
        $this->createTask();

        $this->delete(route('api.task.delete', ['id' => 1]), $this->headers($this->getToken()))
            ->seeJson(['message' => 'DELETED']);
    }
}
