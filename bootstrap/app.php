<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(fn($m) => $m->alias([
        'isAdmin' => \App\Http\Middleware\IsAdmin::class,
    ]))
    ->withMiddleware(fn($m) => $m->alias([
        'isProvider' => \App\Http\Middleware\IsProvider::class,
    ]))
    ->withMiddleware(fn($m) => $m->alias([
        'isUser' => \App\Http\Middleware\IsUser::class,
    ]))
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
