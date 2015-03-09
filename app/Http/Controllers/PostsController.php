<?php namespace Larahunt\Http\Controllers;

use Larahunt\Http\Requests;
use Larahunt\Post;
use Larahunt\Repositories\PostRepository;

class PostsController extends AbstractController
{
    /**
     * @var PostRepository
     */
    private $postRepository;

    /**
     * @param PostRepository $postRepository
     */
    function __construct(PostRepository $postRepository)
    {
        parent::__construct();

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
     * @return \Illuminate\View\View
     */
    public function handleStore()
    {
        return 'hello';
    }
}
