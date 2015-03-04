<?php

namespace Larahunt\Events;

use Illuminate\Queue\SerializesModels;
use Larahunt\Models\User;

class UserHasLoggedInEvent
{
    use SerializesModels;

    /**
     * The user that has logged in.
     */
    protected $user;

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
