<?php

/*
 * This file is part of Larahunt.
 *
 * (c) Vincent Klaiber <hello@vinkla.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Larahunt\Http\Controllers;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\View;

/**
 * This is the account controller class.
 *
 * @author Graham Campbell <graham@mineuk.com>
 * @author Vincent Klaiber <hello@vinkla.com>
 */
class AccountController extends AbstractController
{
    /**
     * The authentication guard instance.
     */
    protected $auth;

    /**
     * Create a new account controller instance.
     *
     * @param \Illuminate\Contracts\Auth\Guard $auth
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
     * @return \Illuminate\View\View
     */
    public function handleShow()
    {
        return View::make('pages.account');
    }
}
