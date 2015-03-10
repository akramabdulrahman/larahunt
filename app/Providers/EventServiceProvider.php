<?php

namespace Larahunt\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

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
