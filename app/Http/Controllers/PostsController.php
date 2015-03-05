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
        $this->postRepository = $postRepository;

        $this->middleware('auth', ['only' => ['store', 'update', 'destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function handleHome()
    {
        $days = $this->postRepository->allGroupedByDays();

		return view('posts.index', compact('days'));
	}

    public function handleCreate()
    {
        return view('posts.create');
    }
}
