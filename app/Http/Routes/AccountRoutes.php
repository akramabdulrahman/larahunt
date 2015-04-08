<?php

/*
 * This file is part of Larahunt.
 *
 * (c) Vincent Klaiber <hello@vinkla.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Larahunt\Http\Routes;

use Illuminate\Contracts\Routing\Registrar;

/**
 * This is the account routes class.
 *
 * @author Graham Campbell <graham@mineuk.com>
 * @author Vincent Klaiber <hello@vinkla.com>
 */
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

        $router->get('account', [
            'as'   => 'account_path',
            'uses' => 'AccountController@handleShow',
        ]);

        $router->delete('account/delete', [
            'as'   => 'account_delete_path',
            'uses' => 'AccountController@handleDelete',
        ]);
    }
}
