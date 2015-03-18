<?php

namespace Larahunt\Commands;

use Larahunt\Models\Post;
use Larahunt\Models\User;

class PostVoteCommand
{
    /**
     * The voting post.
     *
     * @var \Larahunt\Commands\Post
     */
    private $post;

    /**
     * The voting user.
     *
     * @var \Larahunt\Commands\User
     */
    private $user;

    /**
     * @param \Larahunt\Models\Post $post
     * @param \Larahunt\Models\User $user
     */
    public function __construct(Post $post, User $user)
    {
        $this->post = $post;
        $this->user = $user;
    }

    /**
     * Get the voted post.
     *
     * @return Post
     */
    public function getPost()
    {
        return $this->post;
    }

    /**
     * Get the voting user.
     *
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }
}