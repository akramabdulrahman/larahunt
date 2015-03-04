<?php

namespace Larahunt\Repositories;

use Larahunt\Models\User;

class UserRepository
{
    /**
     * Find a user by its id.
     *
     * @param string $id
     *
     * @return Larahunt\Models\User|null
     */
    public function find($id)
    {
        return User::find($id);
    }

    /**
     * Find a user by its id, or generate a new one.
     *
     * @param $id
     * @param array $attributes
     *
     * @return $this|null|\Larahunt\Models\User
     */
    public function findOrGenerate($id, array $attributes = [])
    {
        $user = $this->find($id);

        // if the user exists, we're done here
        if ($user) {
            return $user;
        }

        // otherwise, create a new user, allowing the id to be overwritten
        return (new User())->forceFill(array_merge(['id' => $id], $attributes));
    }
}
