<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\AdminAuth;
use App\Http\Middleware\AdminOrSuperAdminAuth;
use App\Http\Middleware\SuperAdminAuth;
use App\Http\Middleware\UserAuth;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'superadmin'=>SuperAdminAuth::class,
            'admin'=>AdminAuth::class,
            'admin.superadmin'=>AdminOrSuperAdminAuth::class,
            'customer'=>UserAuth::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
