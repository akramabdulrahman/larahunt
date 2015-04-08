<?php

/*
 * This file is part of Larahunt.
 *
 * (c) Vincent Klaiber <hello@vinkla.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Larahunt\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * This is the view composer service provider class.
 *
 * @author Joseph Cohen <joseph.cohen@dinkbit.com>
 * @author Vincent Klaiber <hello@vinkla.com>
 */
class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->view->composer('*', 'Larahunt\Composers\CurrentUserComposer');
    }
}
