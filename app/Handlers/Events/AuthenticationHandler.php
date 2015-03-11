<?php

namespace Larahunt\Handlers\Events;

use Illuminate\Contracts\Auth\Guard;
use Larahunt\Events\UserHasLoggedInEvent;

class AuthenticationHandler
{
    /**
     * The authentication guard instance.
     *
     * @var \Illuminate\Contracts\Auth\Guard
     */
    protected $auth;

    /**
     * Create a new authentication handler instance.
     *
     * @param \Illuminate\Contracts\Auth\Guard $auth
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle the user has logged in event.
     *
     * @param UserHasLoggedInEvent $event
     */
    public function handle(UserHasLoggedInEvent $event)
    {
        $user = $event->getUser();

        $this->auth->login($user);
    }
}
