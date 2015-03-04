<?php

namespace Larahunt\Http\Routes;

use Illuminate\Contracts\Routing\Registrar;

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
            'uses' => 'PostsController@index',
        ]);
    }
}
