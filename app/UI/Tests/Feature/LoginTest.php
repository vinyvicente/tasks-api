<?php

namespace App\UI\Tests\Feature;

use Laravel\Lumen\Testing\DatabaseMigrations;

class LoginTest extends CreateUserTest
{
    use DatabaseMigrations;

    public function testCanWrongLoginWithoutPassword()
    {
        $response = $this->call('POST', route('login'), [
            'email'                 => 'vinyvicente@gmail.com',
        ]);

        $this->assertEquals(422, $response->getStatusCode());
    }

    public function testCanLoginNotAuthorized()
    {
        $response = $this->call('POST', route('login'), [
            'email'                 => 'vinyvicente@gmail.com',
            'password'              => '1234-test',
        ]);

        $response = reset($response->original);

        $this->assertEquals(401, $response->getStatusCode());
    }

    protected function attemptLogin()
    {
        return $this->call('POST', route('login'), [
            'email'                 => 'vinyvicente@gmail.com',
            'password'              => '1234-test',
        ]);
    }

    public function testCanLoginAuthorized()
    {
        $this->createUser();

        $response = $this->attemptLogin();

        $response = reset($response->original);

        $this->assertEquals(200, $response->getStatusCode());
    }
}
