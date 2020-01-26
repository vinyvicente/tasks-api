<?php

/** @var \Illuminate\Support\Facades\Route $router */
$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->post('users', ['as' => 'register', 'uses' => '\App\UI\RestAPI\Controllers\CreateUser']);
    $router->post('login', ['as' => 'login', 'uses' => '\App\UI\RestAPI\Controllers\AuthenticateUser']);

    $router->group(['middleware' => 'auth'], function () use ($router) {
        $router->get('tasks', ['as' => 'api.task.list', 'uses' => '\App\UI\RestAPI\Controllers\ListTasks']);
        $router->post('tasks', ['as' => 'api.task.create', 'uses' => '\App\UI\RestAPI\Controllers\CreateTasks']);
        $router->patch('tasks/{id}', ['as' => 'api.task.patch', 'uses' => '\App\UI\RestAPI\Controllers\UpdateTasks']);
        $router->delete('tasks/{id}', ['as' => 'api.task.delete', 'uses' => '\App\UI\RestAPI\Controllers\DeleteTasks']);
    });
});
