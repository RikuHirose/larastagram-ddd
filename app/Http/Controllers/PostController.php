<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Requests\PostStoreRequest;
use packages\UseCase\Post\Store\PostGetListUseCaseInterface;

class PostController extends Controller
{
    public function create()
    {
        return view('pages.post.create', [
        ]);
    }

    public function store(PostStoreRequest $request)
    {

        if ($request->file('image')->isValid()) {
            $fileName = $request->file('image')->getClientOriginalName();
            // upload
            $request->file('image')->storeAs('public/images', $fileName);

            $fullFilePath = '/storage/images/'.$fileName;
            $description  = $request->input('description');

            Post::create([
                'user_id'     => \Auth::user()->id,
                'img_url'     => $fullFilePath,
                'description' => $description
            ]);
        }
        return redirect(route('index'));
    }
}
