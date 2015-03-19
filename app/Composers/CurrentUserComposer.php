<?php

namespace Larahunt\Composers;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\View\View;

class CurrentUserComposer
{
    /**
     * The authentication guard instance.
     *
     * @var \Illuminate\Contracts\Auth\Guard
     */
    protected $auth;

    /**
     * Create a new current user composer instance.
     *
     * @param Guard $auth
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Bind data to the view.
     *
     * @param View $view
     */
    public function compose(View $view)
    {
        $view->with('currentUser', $this->auth->user());
    }
}
