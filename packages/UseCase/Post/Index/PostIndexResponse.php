<?php

namespace packages\UseCase\Post\Index;

class PostIndexResponse
{
    public $posts;

    /**
     * PostIndexResponse constructor.
     * @param PostModel[] $posts
     */
    public function __construct($posts)
    {
        $this->posts = $posts;
    }
}
