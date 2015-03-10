<?php

namespace Larahunt\Handlers\Commands;

use Larahunt\Commands\CreatePostCommand;
use Larahunt\Events\PostWasCreated;
use Larahunt\Models\Post;

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
