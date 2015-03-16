<?php

namespace Larahunt\Commands;

class LoginCommand
{
    /**
     * The user's id.
     *
     * @var string
     */
    protected $id;

    /**
     * The user's name.
     *
     * @var string
     */
    protected $name;

    /**
     * The user's username.
     *
     * @var string
     */
    protected $username;

    /**
     * The user's email address.
     *
     * @var string
     */
    protected $email;

    /**
     * The user's access token.
     *
     * @var string
     */
    protected $token;

    /**
     * Create a new login command instance.
     *
     * @param string $id
     * @param string $name
     * @param string $username
     * @param string $email
     * @param string $token
     *
     */
    public function __construct($id, $name, $username, $email, $token)
    {
        $this->id = $id;
        $this->name = $name ?: $username;
        $this->username = $username;
        $this->email = $email;
        $this->token = $token;
    }

    /**
     * Get the user's id.
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the user's name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the user's username.
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Get the user's email address.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Get the user's access token.
     *
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }
}
