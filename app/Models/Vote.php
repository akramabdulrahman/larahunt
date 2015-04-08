<?php

/*
 * This file is part of Larahunt.
 *
 * (c) Vincent Klaiber <hello@vinkla.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Larahunt\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * This is the vote model class.
 *
 * @author Vincent Klaiber <hello@vinkla.com>
 */
class Vote extends Model
{
    /**
     * A list of methods protected from mass assignment.
     *
     * @var array
     */
    protected $guarded = ['_token', '_method'];
}
