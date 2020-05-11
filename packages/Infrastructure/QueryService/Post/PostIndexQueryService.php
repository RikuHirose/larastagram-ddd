<?php

namespace packages\Infrastructure\QueryService\Post;

use App\Post;
use packages\UseCase\Post\Index\PostDto;
use packages\UseCase\Post\Index\PostIndexQueryServiceInterface;

class PostIndexQueryService implements PostIndexQueryServiceInterface
{
    private $eloquent;

    /**
     * @param Post $eloquent
     */
    public function __construct(Post $eloquent)
    {
        $this->eloquent = $eloquent;
    }

    /**
     */
    public function handle()
    {
        // FIXME eloquentではなくquery builderの方が良い
        $posts = $this->eloquent->latest()->get();
        $posts->load('user', 'comments.user', 'likes');

        // return new PostDto($posts);
        return $posts;
    }
}
