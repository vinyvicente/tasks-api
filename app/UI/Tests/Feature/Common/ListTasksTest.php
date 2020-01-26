<?php

namespace App\UI\Tests\Feature;

use App\UI\Tests\Feature\Common\Authenticate;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Tests\TestCase;

class ListTasksTest extends TestCase
{
    use DatabaseMigrations;
    use Authenticate;

    private function create()
    {
        $this->post(route('api.task.create'), ['title' => 'My new title', 'due_date' => '2020-02-02'], $this->headers($this->getToken()));
        $this->post(route('api.task.create'), ['title' => 'My new title 2'], $this->headers($this->getToken()));
        $this->post(route('api.task.create'), ['title' => 'My new title 3'], $this->headers($this->getToken()));
    }

    public function testListTasks()
    {
        $this->create();

        $this->get(route('api.task.list'), $this->headers($this->getToken()))
            ->seeJsonDoesntContains(['title' => 'My new title'])
            ->seeJsonContains(['title' => 'My new title 2'])
            ->seeJsonContains(['title' => 'My new title 3'])
            ->seeStatusCode(200);
    }

    public function testListTasksFilteringDueDate()
    {
        $this->create();

        $this->get(route('api.task.list', ['dueDate' => '2020-02-02']), $this->headers($this->getToken()))
            ->seeJsonContains(['title' => 'My new title'])
            ->seeJsonDoesntContains(['title' => 'My new title 2'])
            ->seeJsonDoesntContains(['title' => 'My new title 3'])
            ->seeStatusCode(200);
    }
}
