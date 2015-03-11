<?php

namespace Larahunt\Events;

use Illuminate\Queue\SerializesModels;
use Larahunt\Models\User;

class UserHasSignedUpEvent
{
    use SerializesModels;

    /**
     * The user that has signed up.
     *
     * @var \Larahunt\Models\User
     */
    protected $user;

    /**
     * Create a new user has signed up event instance.
     *
     * @param \Larahunt\Models\User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Get the user that has signed up.
     *
     * @return \Larahunt\Models\User $user
     */
    public function getUser()
    {
        return $this->user;
    }
}
