<?php

namespace packages\UseCase\Post\GetList;

use packages\Post\Commons\PostModel;

class PostGetListResponse
{
    public $posts;

    /**
     * PostGetListResponse constructor.
     * @param PostModel[] $posts
     */
    public function __construct($posts)
    {
        $this->posts = $posts;
    }
}
