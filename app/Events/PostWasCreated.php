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
use Larahunt\Models\Post;

class PostWasCreated
{
    use SerializesModels;

    /**
     * The newly created post.
     *
     * @var \Larahunt\Models\Post
     */
    private $post;

    /**
     * Create a new event instance.
     *
     * @param \Larahunt\Models\Post $post
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * Fetch the post.
     *
     * @return Post
     */
    public function getPost()
    {
        return $this->post;
    }
}
