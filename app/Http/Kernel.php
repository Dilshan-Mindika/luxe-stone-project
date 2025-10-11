<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    // ... existing code ...

    /**
     * The application's route middleware groups.
     *
     * @var array<string, array<int, string>>
     */
    protected $middlewareGroups = [
        'web' => [
            // ... existing web middleware ...
        ],

        'api' => [
            // ... existing api middleware ...
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array<string, class-string|string>
     */
    protected $routeMiddleware = [
        // ... existing route middleware (like 'auth', 'guest', etc.) ...
        
        // --- MANDATORY FIX: REGISTER ADMIN MIDDLEWARE HERE ---
        'admin' => \App\Http\Middleware\AdminMiddleware::class,
    ];
}
