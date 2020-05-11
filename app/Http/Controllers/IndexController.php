<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Http\ViewModels\Post\Index\PostIndexViewModel;
use packages\UseCase\Post\GetList\PostGetListUseCaseInterface;

class IndexController extends Controller
{
    /**
     * Show the application dashboard.
     *
     */
    public function index(PostGetListUseCaseInterface $interactor)
    {
        $response  = $interactor->handle();
        $viewModel = new PostIndexViewModel($response);

        return view('pages.index', [
            'posts' => $viewModel->posts
        ]);
    }
}
