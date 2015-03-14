<?php

namespace Larahunt\Http\Controllers;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\View;

class AccountController extends AbstractController
{
    /**
     * The authentication guard instance.
     */
    protected $auth;

    /**
     * @param Guard $auth
     */
    public function __construct(Guard $auth)
    {
        parent::__construct();

        $this->auth = $auth;

        $this->middleware('auth');
    }

    /**
     * Show the user's account information.
     *
     * @return View
     */
    public function handleShow()
    {
        return View::make('pages.account');
    }
}
