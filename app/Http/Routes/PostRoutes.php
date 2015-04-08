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
 * This is the post routes class.
 *
 * @author Vincent Klaiber <hello@vinkla.com>
 */
class PostRoutes
{
    /**
     * Define the main routes.
     *
     * @param \Illuminate\Contracts\Routing\Registrar $router
     *
     * @return void
     */
    public function map(Registrar $router)
    {
        $router->get('/', [
            'as' => 'home',
            'uses' => 'PostsController@handleHome',
        ]);

        $router->get('posts/create', [
            'as' => 'create_post_path',
            'uses' => 'PostsController@handleCreate',
        ]);

        $router->post('posts/store', [
            'as' => 'store_post_path',
            'uses' => 'PostsController@handleStore',
        ]);

        $router->post('posts/{post}/edit', [
            'as' => 'edit_post_path',
            'uses' => 'PostsController@handleEdit',
        ]);

        $router->get('posts/{post}/vote', [
            'as' => 'post_vote_path',
            'uses' => 'VoteController@handle',
        ]);
    }
}
