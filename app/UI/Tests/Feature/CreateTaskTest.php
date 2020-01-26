<?php

namespace App\UI\Tests\Feature;

use App\UI\Tests\Feature\Common\Authenticate;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Tests\TestCase;

class CreateTaskTest extends TestCase
{
    use DatabaseMigrations;
    use Authenticate;

    public function testCreateTasUnauthorized()
    {
        $this->post(route('api.task.create'), ['title' => 'My new title'])
            ->seeStatusCode(401);
    }

    public function testCreateTaskWithoutTitle()
    {
        $this->post(route('api.task.create'), ['title' => ''], $this->headers($this->getToken()))
            ->seeJson(['title' => ['The title field is required.']]);
    }

    public function testCreateTask()
    {
        $this->post(route('api.task.create'), ['title' => 'My new title'], $this->headers($this->getToken()))
            ->seeJson(['message' => 'CREATED']);
    }
}
