<?php

namespace App\UI\Tests\Unit;

use App\Domain\User\Entities\User;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Tests\TestCase;

class UserTest extends TestCase
{
    use DatabaseMigrations;

    public function testUserCreate()
    {
        $user = factory(User::class)->make();

        $this->assertNotEmpty($user->name);

        $user->save();

        $this->assertEquals(1, $user->id);
    }

    public function testUpdate()
    {
        $user = factory(User::class)->make();
        $user->save();

        $date = $user->updated_at;

        $user->name = 'Vinicius';
        $user->save();

        $this->assertEquals('Vinicius', $user->name);
        $this->assertNotTrue($date === $user->updated_at);
    }

    public function testUserDelete()
    {
        $user = factory(User::class)->make();

        $this->assertNotEmpty($user->name);

        $user->save();

        $this->assertEquals(1, User::all()->count());

        User::destroy(1);

        $this->assertEquals(0, User::all()->count());
    }
}
