<?php

/*
 * This file is part of Larahunt.
 *
 * (c) Vincent Klaiber <hello@vinkla.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Larahunt\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

/**
 * This is the event service provider class.
 *
 * @author Vincent Klaiber <hello@vinkla.com>
 */
class EventServiceProvider extends ServiceProvider
{
    /**
     * The event handler mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'Larahunt\Events\UserHasLoggedInEvent' => [
            'Larahunt\Handlers\Events\AuthenticationHandler'
        ],
        'Larahunt\Events\UserHasSignedUpEvent' => [
            'Larahunt\Handlers\Events\WelcomeMessageHandler',
        ],
    ];
}
