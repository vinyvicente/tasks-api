<?php

namespace App\Domain\User\Events\Common;

use Illuminate\Http\Request;

trait RequestDependency
{
    private Request $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }
}
