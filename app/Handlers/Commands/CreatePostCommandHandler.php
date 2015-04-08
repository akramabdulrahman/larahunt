<?php

/*
 * This file is part of Larahunt.
 *
 * (c) Vincent Klaiber <hello@vinkla.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Larahunt\Handlers\Commands;

use Larahunt\Commands\CreatePostCommand;
use Larahunt\Events\PostWasCreated;
use Larahunt\Models\Post;

/**
 * This is the create post command handler class.
 *
 * @author Vincent Klaiber <hello@vinkla.com>
 */
class CreatePostCommandHandler
{
    /**
     * Handle the create post command.
     *
     * @param CreatePostCommand $command
     */
    public function handle(CreatePostCommand $command)
    {
        $post = new Post();

        $post->title = $command->getTitle();
        $post->url = $command->getUrl();
        $post->description = $command->getDescription();
        $post->user_id = $command->getUser()->id;

        $post->save();

        event(new PostWasCreated($post));
    }
}
