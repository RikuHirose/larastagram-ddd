<?php

namespace packages\UseCase\Post\Index;

use packages\UseCase\Post\Index\PostIndexResponse;

interface PostIndexUseCaseInterface
{
    /**
     * @return PostIndexResponse
     */
    public function handle(): PostIndexResponse;
}
