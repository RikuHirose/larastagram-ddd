<?php

namespace packages\Domain\Application\Post;

use packages\UseCase\Post\Index\PostIndexQueryServiceInterface;
use packages\UseCase\Post\Index\PostIndexUseCaseInterface;
use packages\UseCase\Post\Index\PostIndexResponse;
use packages\Post\Commons\PostModel;

class PostIndexInteractor implements PostIndexUseCaseInterface
{
    /**
     * @var PostIndexQueryServiceInterface
     */
    private $postIndexQueryService;

    /**
     * @param PostIndexQueryServiceInterface $postIndexQueryService
     */
    public function __construct(
        PostIndexQueryServiceInterface $postIndexQueryService
    ) {
        $this->postIndexQueryService = $postIndexQueryService;
    }

    /**
     * @return PostIndexResponse
     */
    public function handle(): PostIndexResponse
    {
        $posts = $this->postIndexQueryService->handle();

        return new PostIndexResponse($posts);
    }
}
