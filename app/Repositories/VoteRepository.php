<?php

namespace Larahunt\Repositories;

use Larahunt\Models\Post;
use Larahunt\Models\User;
use Larahunt\Models\Vote;

class VoteRepository
{
    /**
     * Find a vote by a post and user.
     *
     * @param \Larahunt\Models\Post $post
     * @param \Larahunt\Models\User $user
     */
    public function findByPostAndUser(Post $post, User $user)
    {
        return Vote::wherePostId($post->id)
            ->whereUserId($user->id)
            ->first();
    }
}
