<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function show($id)
    {
        if ($id == \Auth::user()->id) {
            $authUser = \Auth::user();
            $authUser->load('posts.likes', 'posts.comments', 'following.toUser', 'followers.fromUser');

            return view('pages.user.me', [
                'authUser' => $authUser
            ]);
        }

        if ($id != \Auth::user()->id) {
            $user = User::where('id', $id)->first();
            $user->load('posts.likes', 'posts.comments', 'following.toUser', 'followers.fromUser');

            return view('pages.user.show', [
                'user' => $user
            ]);
        }
    }
}
