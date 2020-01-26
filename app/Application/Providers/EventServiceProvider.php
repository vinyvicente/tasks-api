<?php

namespace App\Application\Providers;

use App\Domain\Task\Events\TaskCreated;
use App\Domain\Task\Events\TaskDeleted;
use App\Domain\Task\Events\TaskListed;
use App\Domain\Task\Events\TaskUpdated;
use App\Domain\Task\Listeners\TaskCreatedEventHandler;
use App\Domain\Task\Listeners\TaskDeletedEventHandler;
use App\Domain\Task\Listeners\TaskListedEventHandler;
use App\Domain\Task\Listeners\TaskUpdatedEventHandler;
use App\Domain\User\Events\UserLogged;
use App\Domain\User\Events\UserRegistered;
use App\Domain\User\Listeners\UserLoggedEventHandler;
use App\Domain\User\Listeners\UserRegisteredEventHandler;
use Laravel\Lumen\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        UserRegistered::class => [
            UserRegisteredEventHandler::class,
        ],
        UserLogged::class => [
            UserLoggedEventHandler::class,
        ],
        TaskCreated::class => [
            TaskCreatedEventHandler::class,
        ],
        TaskUpdated::class => [
            TaskUpdatedEventHandler::class,
        ],
        TaskDeleted::class => [
            TaskDeletedEventHandler::class,
        ],
        TaskListed::class => [
            TaskListedEventHandler::class,
        ],
    ];
}
