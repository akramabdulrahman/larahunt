<?php

namespace Larahunt\Http\Controllers;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Larahunt\Commands\PostVoteCommand;
use Larahunt\Models\Post;

class VoteController extends AbstractController
{
    /**
     * The authenticated user.
     *
     * @var \Illuminate\Contracts\Auth\Guard
     */
    private $auth;

    /**
     * @param \Illuminate\Contracts\Auth\Guard $auth
     */
    public function __construct(Guard $auth)
    {
        parent::__construct();

        $this->auth = $auth;

        $this->middleware('auth');
    }

    /**
     * Handle voting for a post.
     *
     * @param \Larahunt\Models\Post $post
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function handle(Post $post, Request $request)
    {
        $command = new PostVoteCommand($post, $this->auth->user());

        $this->dispatch($command);

        if ($request->ajax()) {
            return new JsonResponse(['voted' => true]);
        }

        return Redirect::route('home');
    }
}
