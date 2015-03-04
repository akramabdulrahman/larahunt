<?php

namespace Larahunt\Handlers\Events;

use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Contracts\Queue\ShouldBeQueued;
use Illuminate\Mail\Message;
use Larahunt\Events\UserHasSignedUpEvent;

class WelcomeMessageHandler implements ShouldBeQueued
{
    /**
     * The mailer instance.
     *
     * @var \Illuminate\Contracts\Mail\Mailer
     */
    protected $mailer;

    /**
     * Create a new welcome message handler instance.
     *
     * @param Mailer $mailer
     */
    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * Handle the user has signed up event.
     *
     * @param UserHasSignedUpEvent $event
     */
    public function handle(UserHasSignedUpEvent $event)
    {
        $user = $event->getUser();

        $mail = [
            'name' => head(explode(' ', $user->name)),
            'email' => $user->email,
            'subject' => 'Welcome To Larahunt',
        ];

        $this->mailer->send(['html' => 'emails.welcome-html', 'text' => 'emails.welcome-text'], $mail, function (Message $message) use ($mail) {
            $message->to($mail['email'])->subject($mail['subject']);
        });
    }
}
