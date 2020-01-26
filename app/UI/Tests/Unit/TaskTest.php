<?php

namespace App\UI\Tests\Unit;

use App\Domain\Task\Entities\Task;
use App\Domain\User\Entities\User;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Tests\TestCase;

class TaskTest extends TestCase
{
    use DatabaseMigrations;

    public function testTaskCreate()
    {
        $task = factory(Task::class)->make();
        $user = factory(User::class)->make()->save();
        $task->user_id = $user;

        $this->assertNotEmpty($task->title);

        $task->save();

        $this->assertEquals(1, $task->id);
    }

    public function testUpdate()
    {
        $task = factory(Task::class)->make();
        $user = factory(User::class)->make()->save();
        $task->user_id = $user;
        $task->save();

        $date = $task->updated_at;

        $task->title = 'My New Title';
        $task->save();

        $this->assertEquals('My New Title', $task->title);
        $this->assertNotTrue($date === $task->updated_at);
    }

    public function testTaskDelete()
    {
        $task = factory(Task::class)->make();
        $user = factory(User::class)->make()->save();
        $task->user_id = $user;

        $this->assertNotEmpty($task->title);

        $task->save();

        $this->assertEquals(1, Task::all()->count());

        Task::destroy(1);

        $this->assertEquals(0, Task::all()->count());
    }
}
