<?php

/*
 * This file is part of Larahunt.
 *
 * (c) Vincent Klaiber <hello@vinkla.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Larahunt\Events;

use Illuminate\Queue\SerializesModels;
use Larahunt\Models\User;

/**
 * This is the user has logged in event class.
 *
 * @author Graham Campbell <graham@mineuk.com>
 * @author Vincent Klaiber <hello@vinkla.com>
 */
class UserHasLoggedInEvent
{
    use SerializesModels;

    /**
     * The user that has logged in.
     *
     * @var \Larahunt\Models\User
     */
    private $user;

    /**
     * Create a new user has logged in event instance.
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Get the user that has logged in.
     *
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }
}
