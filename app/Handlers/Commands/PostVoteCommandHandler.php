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

use Larahunt\Commands\PostVoteCommand;
use Larahunt\Models\Vote;
use Larahunt\Repositories\VoteRepository;

/**
 * This is the post vote command handler class.
 *
 * @author Vincent Klaiber <hello@vinkla.com>
 */
class PostVoteCommandHandler
{
    /**
     * @var \Larahunt\Repositories\VoteRepository
     */
    private $voteRepository;

    /**
     * @param \Larahunt\Repositories\VoteRepository $voteRepository
     */
    public function __construct(VoteRepository $voteRepository)
    {
        $this->voteRepository = $voteRepository;
    }

    /**
     * @param \Larahunt\Commands\PostVoteCommand $command
     */
    public function handle(PostVoteCommand $command)
    {
        $vote = $this->voteRepository->findByPostAndUser(
            $command->getPost(),
            $command->getUser()
        );

        if ($vote) {
            return $vote->delete();
        }

        $vote = new Vote();

        $vote->post_id = $command->getPost()->id;
        $vote->user_id = $command->getUser()->id;

        $vote->save();
    }
}
