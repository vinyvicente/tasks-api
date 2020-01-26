<?php

namespace Tests;

use App\Application\Exceptions\Handler;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Contracts\Auth\Authenticatable;
use Laravel\Lumen\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    protected Authenticatable $loginUser;
    protected array $headers;

    protected function setUp(): void
    {
        parent::setUp();
    }

    public function actingAs(Authenticatable $user, $driver = null)
    {
        $this->headers = $this->headers($user);

        return $this;
    }

    protected function headers($token)
    {
        $headers = ['Accept' => 'application/json'];

        if (!is_null($token)) {
            $headers['Authorization'] = 'Bearer '.$token;
        }

        return $this->transformHeadersToServerVars($headers);
    }

    protected function disableExceptionHandling()
    {
        $this->app->instance(ExceptionHandler::class, new class extends Handler {
            public function __construct()
            {
            }

            public function report(\Exception $exception)
            {
            }

            public function render($request, \Exception $exception)
            {
                throw $exception;
            }
        });
    }
}
