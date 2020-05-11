<?php

namespace packages\UseCase\Post\Index;

class PostDto
{
    public $posts;

    /**
     * @param $posts
     */
    public function __construct($posts)
    {
        $this->posts = $posts;
    }
}
