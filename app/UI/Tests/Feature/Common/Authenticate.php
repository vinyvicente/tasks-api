<?php

namespace App\UI\Tests\Feature\Common;

trait Authenticate
{
    protected function createUser()
    {
        return $this->call('POST', route('register'), [
            'name'                  => 'Vinicius',
            'email'                 => 'vinyvicente@gmail.com',
            'password'              => '1234-test',
            'password_confirmation' => '1234-test',
        ]);
    }

    protected function attemptLogin()
    {
        return $this->call('POST', route('login'), [
            'email'                 => 'vinyvicente@gmail.com',
            'password'              => '1234-test',
        ]);
    }

    protected function getToken(): string
    {
        $this->createUser();
        $result = $this->attemptLogin();
        $result = json_decode($result->content());
        $result = reset($result);

        return $result->original->token;
    }
}
