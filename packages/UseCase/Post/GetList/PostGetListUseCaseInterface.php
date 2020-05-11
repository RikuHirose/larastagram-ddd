<?php

namespace packages\UseCase\Post\GetList;

use packages\UseCase\Post\GetList\PostGetListResponse;

interface PostGetListUseCaseInterface
{
    /**
     * @return PostGetListResponse
     */
    public function handle(): PostGetListResponse;
}
