<?php namespace Larahunt\Events;

use Illuminate\Queue\SerializesModels;

class PostWasCreated
{

    use SerializesModels;

    /**
     * Create a new event instance.
     */
    public function __construct()
    {
        //
    }
}