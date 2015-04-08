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

use Illuminate\Support\Facades\View;

/**
 * This is the pages controller class.
 *
 * @author Vincent Klaiber <hello@vinkla.com>
 */
class PagesController extends AbstractController
{
    /**
     * Display the about view.
     *
     * @return mixed
     */
    public function handleAbout()
    {
        return View::make('pages.about');
    }
}
