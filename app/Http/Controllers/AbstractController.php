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

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;

abstract class AbstractController extends Controller
{
    use DispatchesCommands, ValidatesRequests;

    /**
     * Create a new controller instance.
     *
     * @param array $csrf
     */
    public function __construct(array $csrf = [])
    {
        $this->middleware('csrf', $csrf);
    }
}
