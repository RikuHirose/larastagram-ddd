<?php

namespace packages\Domain\Application\Post;

use packages\UseCase\Post\GetList\PostGetListQueryServiceInterface;
use packages\UseCase\Post\GetList\PostGetListUseCaseInterface;
use packages\UseCase\Post\GetList\PostGetListResponse;
use packages\Post\Commons\PostModel;

class PostGetListInteractor implements PostGetListUseCaseInterface
{
    /**
     * @var PostGetListQueryServiceInterface
     */
    private $postGetListQueryService;

    /**
     * @param PostGetListQueryServiceInterface $postGetListQueryService
     */
    public function __construct(
        PostGetListQueryServiceInterface $postGetListQueryService
    ) {
        $this->postGetListQueryService = $postGetListQueryService;
    }

    /**
     * @return PostGetListResponse
     */
    public function handle(): PostGetListResponse
    {
        $posts = $this->postGetListQueryService->handle();

        return new PostGetListResponse($posts);
    }
}
