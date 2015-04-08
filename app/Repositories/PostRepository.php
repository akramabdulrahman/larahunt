<?php

/*
 * This file is part of Larahunt.
 *
 * (c) Vincent Klaiber <hello@vinkla.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Larahunt\Repositories;

use Larahunt\Models\Post;

/**
 * This is the post repository class.
 *
 * @author Vincent Klaiber <hello@vinkla.com>
 */
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
            ->get()
            ->sortBy(function ($post) {
                return $post->votes->count();
            })
            ->reverse();
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
