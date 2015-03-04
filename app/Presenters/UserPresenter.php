<?php

namespace Larahunt\Presenters;

use McCool\LaravelAutoPresenter\BasePresenter;

class UserPresenter extends BasePresenter
{
    /**
     * Returns a Gravatar URL for the users email address.
     *
     * @param int $size
     *
     * @return string
     */
    public function gravatar($size = 50)
    {
        return sprintf('https://www.gravatar.com/avatar/%s?size=%d', md5($this->email), $size);
    }
}
