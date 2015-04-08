<?php

/*
 * This file is part of Larahunt.
 *
 * (c) Vincent Klaiber <hello@vinkla.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Larahunt\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

/**
 * This is the http kernal class.
 *
 * @author Vincent Klaiber <hello@vinkla.com>
 */
class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * @var array
     */
    protected $middleware = [
        'Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode',
        'Illuminate\Cookie\Middleware\EncryptCookies',
        'Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse',
        'Illuminate\Session\Middleware\StartSession',
        'Illuminate\View\Middleware\ShareErrorsFromSession',
    ];

    /**
     * The application's route middleware.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => 'Larahunt\Http\Middleware\Authenticate',
        'csrf'  => 'Larahunt\Http\Middleware\VerifyCsrfToken',
        'guest' => 'Larahunt\Http\Middleware\RedirectIfAuthenticated',
    ];
}
