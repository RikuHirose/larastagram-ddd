<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Mock で実行したい場合はコメントアウト
        $this->registerForInMemory();

        // Mock で実行したい場合はコメント外す
        if (config('app.env') === 'testing') {
            $this->registerForMock();
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    private function registerForInMemory(){

        $this->app->bind(
            \packages\UseCase\Post\Index\PostIndexUseCaseInterface::class,
            \packages\Domain\Application\Post\PostIndexInteractor::class
        );

        $this->app->bind(
            \packages\UseCase\Post\Index\PostIndexQueryServiceInterface::class,
            \packages\Infrastructure\QueryService\Post\PostIndexQueryService::class
        );

        // $this->app->bind(
        //     \packages\UseCase\Post\Create\PostCreateUseCaseInterface::class,
        //     \packages\Domain\Application\Post\PostCreateInteractor::class
        // );
    }

    private function registerForMock(){

        $this->app->bind(
            \packages\UseCase\Post\Index\PostIndexUseCaseInterface::class,
            \packages\MockInteractor\Post\MockPostGetInteractor::class
        );

        // $this->app->bind(
        //     \packages\UseCase\Post\Create\PostCreateUseCaseInterface::class,
        //     \packages\MockInteractor\Post\MockPostCreateInteractor::class
        // );
    }
}
