<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        Comment::create([
            'user_id'     => \Auth::user()->id,
            'post_id'     => $request->input('post_id'),
            'description' => $request->input('comment')
        ]);

        return redirect(route('index'));
    }
}
