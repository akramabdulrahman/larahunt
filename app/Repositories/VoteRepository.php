<?php

/*
 * This file is part of Larahunt.
 *
 * (c) Vincent Klaiber <hello@vinkla.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

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
