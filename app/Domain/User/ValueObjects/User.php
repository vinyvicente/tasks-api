<?php

namespace App\Domain\User\ValueObjects;

use App\Domain\User\Entities\User as Entity;

class User
{
    private ?int $id;
    private ?string $name;
    private string $email;
    private string $password;

    public function __construct(string $email, string $password, string $name = null, int $id = null)
    {
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
        $this->id = $id;
    }

    public function loginData(): array
    {
        return [
            'email' => $this->email,
            'password' => $this->password,
        ];
    }

    public function getEntityToStore(): Entity
    {
        $entity =  new Entity([
            'name' => $this->name,
            'email' => $this->email,
        ]);

        $entity->password = app('hash')->make($this->password);

        return $entity;
    }
}
