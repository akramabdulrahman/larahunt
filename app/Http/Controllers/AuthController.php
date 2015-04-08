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
use Illuminate\Support\Facades\Redirect;
use Larahunt\Commands\LoginCommand;
use Larahunt\User;
use StyleCI\Login\LoginProvider;

/**
 * This is the auth controller class.
 *
 * @author Graham Campbell <graham@mineuk.com>
 * @author Joseph Cohen <joseph.cohen@dinkbit.com>
 * @author Vincent Klaiber <hello@vinkla.com>
 */
class AuthController extends AbstractController
{
    /**
     * Create a new authentication controller instance.
     */
    public function __construct()
    {
        parent::__construct();

        $this->middleware('guest', ['except' => ['handleLogout']]);
    }

    /**
     * Connect to the GitHub provider using OAuth.
     *
     * @param \StyleCI\Login\LoginProvider $login
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleLogin(LoginProvider $login)
    {
        return $login->redirect();
    }

    /**
     * Get the user access token to save notifications.
     *
     * @param \StyleCI\Login\LoginProvider $login
     *
     * @return \Illuminate\Http\Response
     */
    public function handleCallback(LoginProvider $login)
    {
        $user = $login->user();

        $command = new LoginCommand(
            array_get($user, 'id'),
            array_get($user, 'name'),
            array_get($user, 'login'),
            array_get($user, 'email'),
            array_get($user, 'token')
        );

        $this->dispatch($command);

        return Redirect::route('home');
    }

    /**
     * Logout a user account.
     *
     * @param \Illuminate\Contracts\Auth\Guard $auth
     *
     * @return \Illuminate\Http\Response
     */
    public function handleLogout(Guard $auth)
    {
        $auth->logout();

        return Redirect::route('home');
    }
}
