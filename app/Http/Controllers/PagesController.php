<?php

namespace Larahunt\Http\Controllers;

use Illuminate\Support\Facades\View;

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
