<?php namespace Larahunt\Http\Controllers;

use Illuminate\Contracts\Auth\Guard;
use Larahunt\Commands\CreatePostCommand;
use Larahunt\Http\Requests;
use Larahunt\Http\Requests\CreatePostRequest;
use Larahunt\Post;
use Larahunt\Repositories\PostRepository;

class PostsController extends AbstractController
{
    /**
     * @var PostRepository
     */
    private $postRepository;

    /**
     * @var Guard
     */
    private $auth;

    /**
     * @param Guard $auth
     * @param PostRepository $postRepository
     */
    function __construct(Guard $auth, PostRepository $postRepository)
    {
        parent::__construct();

        $this->auth = $auth;
        $this->postRepository = $postRepository;

        $this->middleware('auth', ['only' => ['handleCreate']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function handleHome()
    {
        $days = $this->postRepository->allGroupedByDays();

		return view('posts.index', compact('days'));
	}

    /**
     * Show the create form.
     *
     * @return \Illuminate\View\View
     */
    public function handleCreate()
    {
        return view('posts.create');
    }

    /**
     * Store a post in the database.
     *
     * @param CreatePostRequest $request
     *
     * @return \Illuminate\View\View
     */
    public function handleStore(CreatePostRequest $request)
    {
        $command = new CreatePostCommand(
            $request->title,
            $request->url,
            $request->description,
            $this->auth->user()
        );

        $this->dispatch($command);

        return view('posts.confirmation');
    }
}
