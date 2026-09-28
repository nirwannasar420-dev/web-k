<?php

use App\Http\Middleware\RoleMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;

return Application::configure(basePath: dirname(__DIR__))

    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )

    ->withMiddleware(function (Middleware $middleware): void {

        $middleware->trustProxies(at: '*');

        $middleware->alias([
            'role' => RoleMiddleware::class,
        ]);

    })

    ->withExceptions(function (Exceptions $exceptions): void {

        /*
        |--------------------------------------------------------------------------
        | CUSTOM 403 FORBIDDEN PAGE
        |--------------------------------------------------------------------------
        |
        | When the application returns HTTP 403, Laravel will display
        | the custom resources/views/errors/403.blade.php page.
        |
        */

        $exceptions->render(function (
            HttpExceptionInterface $exception,
            $request
        ) {

            if ($exception->getStatusCode() === 403) {

                return response()->view(
                    'errors.403',
                    [],
                    403
                );

            }

        });

    })

    ->create();