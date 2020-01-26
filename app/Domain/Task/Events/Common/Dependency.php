<?php

namespace App\Domain\Task\Events\Common;

use App\Domain\User\Entities\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

trait Dependency
{
    protected Request $request;
    protected User $user;

    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->user = $request->user();
    }
}
