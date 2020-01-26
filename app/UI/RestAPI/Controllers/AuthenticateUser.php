<?php

namespace App\UI\RestAPI\Controllers;

use App\Domain\User\Events\UserLogged;
use Illuminate\Http\Request;

class AuthenticateUser extends Controller
{
    public function __invoke(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        return event(new UserLogged($request));
    }
}
