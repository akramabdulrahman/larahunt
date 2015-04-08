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

use Larahunt\Commands\LoginCommand;
use Larahunt\Events\UserHasLoggedInEvent;
use Larahunt\Events\UserHasSignedUpEvent;
use Larahunt\Repositories\UserRepository;

/**
 * This is the login command handler class.
 *
 * @author Graham Campbell <graham@mineuk.com>
 * @author Joseph Cohen <joseph.cohen@dinkbit.com>
 * @author Vincent Klaiber <hello@vinkla.com>
 */
class LoginCommandHandler
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Handle the login command.
     *
     * @param LoginCommand $command
     */
    public function handle(LoginCommand $command)
    {
        $user = $this->userRepository->findOrGenerate($command->getId());

        $new = $user->exists === false;

        $user->name = $command->getName();
        $user->email = $command->getEmail();
        $user->username = $command->getUsername();
        $user->access_token = $command->getToken();

        $user->save();

        if ($new) {
            event(new UserHasSignedUpEvent($user));
        }

        event(new UserHasLoggedInEvent($user));
    }
}
