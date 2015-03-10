<?php

namespace Larahunt\Repositories;

use Larahunt\Models\Post;

class PostRepository
{
    /**
     * Find all posts.
     *
     * @return mixed
     */
    public function all()
    {
        return Post::where('published', true)
           ->orderBy('published_at', 'desc')
           ->get();
    }

    /**
     * Fetch all post grouped by days.
     *
     * @return mixed
     */
    public function allGroupedByDays()
    {
        $posts = $this->all();

        return $posts->groupBy(function ($post) {
            $date = $post->published_at;

            if ($date->isToday()) {
                return 'Today';
            }

            if ($date->isYesterday()) {
                return 'Yesterday';
            }

            return $date->format('l');
        });
    }
}
