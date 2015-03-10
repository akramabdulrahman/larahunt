<?php

namespace Larahunt\Commands;

use Larahunt\Models\User;

class CreatePostCommand
{
    /**
     * The post title.
     *
     * @var string
     */
    private $title;

    /**
     * The post link.
     *
     * @var string
     */
    private $url;

    /**
     * The post description.
     *
     * @var string
     */
    private $description;

    /**
     * The post author.
     *
     * @var User
     */
    private $user;

    /**
     * @param $title
     * @param $url
     * @param $description
     * @param User $user
     */
    public function __construct($title, $url, $description, User $user)
    {
        $this->title = $title;
        $this->url = $url;
        $this->description = $description;
        $this->user = $user;
    }

    /**
     * Get the post title.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Get the post link.
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Get the post description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Get post author.
     *
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }
}
