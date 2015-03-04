<?php

namespace Larahunt\Http\Routes;

use Illuminate\Contracts\Routing\Registrar;

class AccountRoutes
{
    /**
     * Define the account routes.
     *
     * @param \Illuminate\Contracts\Routing\Registrar $router
     *
     * @return void
     */
    public function map(Registrar $router)
    {
        $router->get('auth/login', [
            'as' => 'auth_login_path',
            'uses' => 'AuthController@handleLogin',
        ]);

        $router->get('auth/github-callback', [
            'as' => 'auth_callback_path',
            'uses' => 'AuthController@handleCallback',
        ]);

        $router->get('auth/logout', [
            'as' => 'auth_logout_path',
            'uses' => 'AuthController@handleLogout',
        ]);
    }
}
