<?php

namespace App\UI\RestAPI\Controllers;

use App\Domain\User\Events\UserRegistered;
use Illuminate\Http\Request;

class CreateUser extends Controller
{
    public function __invoke(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);

        return event(new UserRegistered($request));
    }
}
