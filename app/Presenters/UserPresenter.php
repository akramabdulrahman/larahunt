<?php

/*
 * This file is part of Larahunt.
 *
 * (c) Vincent Klaiber <hello@vinkla.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Larahunt\Presenters;

use Laracasts\Presenter\Presenter;

class UserPresenter extends Presenter
{
    /**
     * Returns a Gravatar URL for the users email address.
     *
     * @param int $size
     * @param string $default
     *
     * @return string
     */
    public function gravatar($size = 50, $default = 'mm')
    {
        return sprintf('https://www.gravatar.com/avatar/%s?size=%d&d=%s', md5($this->email), $size, $default);
    }
}
