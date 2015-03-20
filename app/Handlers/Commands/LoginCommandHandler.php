<?php

namespace Larahunt\Handlers\Commands;

use Larahunt\Commands\LoginCommand;
use Larahunt\Events\UserHasLoggedInEvent;
use Larahunt\Events\UserHasSignedUpEvent;
use Larahunt\Repositories\UserRepository;

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
