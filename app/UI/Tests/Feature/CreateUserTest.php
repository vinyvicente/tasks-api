<?php

namespace App\UI\Tests\Feature;

use Laravel\Lumen\Testing\DatabaseMigrations;
use Tests\TestCase;

class CreateUserTest extends TestCase
{
    use DatabaseMigrations;

    public function testCanRegister()
    {
        $response = $this->createUser();

        $response = reset($response->original);

        $this->assertEquals(201, $response->getStatusCode());
    }

    protected function createUser()
    {
        return $this->call('POST', route('register'), [
            'name'                  => 'Vinicius',
            'email'                 => 'vinyvicente@gmail.com',
            'password'              => '1234-test',
            'password_confirmation' => '1234-test',
        ]);
    }

    public function testCannotRegisterBecauseEmailAlreadyRegistered()
    {
        $this->createUser();
        $response = $this->createUser();

        $this->assertEquals(422, $response->getStatusCode());
    }
}
