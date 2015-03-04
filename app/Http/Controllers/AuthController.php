<?php

namespace Larahunt\Http\Controllers;

use Larahunt\Commands\LoginCommand;
use Larahunt\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Larahunt\User;
use Laravel\Socialite\GithubProvider;

class AuthController extends AbstractController
{
    /**
     * Create a new authentication controller instance.
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => ['handleLogout']]);
    }

    /**
     * Connect to the GitHub provider using OAuth.
     *
     * @param \Laravel\Socialite\GithubProvider $socialite
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleLogin(GithubProvider $socialite)
    {
        $socialite->scopes(['user:email']);

        return $socialite->redirect();
    }

    /**
     * Get the user access token to save notifications.
     *
     * @param \Laravel\Socialite\GithubProvider $socialite
     *
     * @return \Illuminate\Http\Response
     */
    public function handleCallback(GithubProvider $socialite)
    {
        $socialiteUser = $socialite->user();

        $command = new LoginCommand(
            $socialiteUser->id,
            $socialiteUser->name,
            $socialiteUser->nickname,
            $socialiteUser->email,
            $socialiteUser->token
        );

        $this->dispatch($command);

        return redirect('/');
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

        return redirect('/');
    }
}
