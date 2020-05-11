<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Like;

class LikeController extends Controller
{
    public function store(Request $request)
    {
        Like::create([
            'user_id'     => \Auth::user()->id,
            'post_id'     => $request->input('post_id')
        ]);

        return redirect(route('index'));
    }

    public function destroy(Request $request)
    {
        $like = Like::buildQueryByUserIdAndPostId(
          \Auth::user()->id,
          $request->input('post_id')
        )->first();

        $like->delete();

        return redirect(route('index'));
    }
}
