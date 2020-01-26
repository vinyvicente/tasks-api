<?php

namespace Tests;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Laravel\Lumen\Application;

trait CreatesApplication
{
    public function createApplication(): Application
    {
        $app = require __DIR__ . '/../../bootstrap/app.php';

        Hash::setRounds(4);

        Cache::flush();

        return $app;
    }
}
