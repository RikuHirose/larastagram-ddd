<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Follow;

class followController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->query();
        if (isset($filter['type']) && $filter['type'] !== 'following' && $filter['type'] !== 'followers') {
            return redirect()->back();
        }

        if ($filter['type'] === 'following') {
            $toUserIds = Follow::where('from_user_id', \Auth::user()->id)->pluck('to_user_id');
            $users = User::whereIn('id', $toUserIds)->get();
        }

        if ($filter['type'] === 'followers') {
            $fromUserIds = Follow::where('to_user_id', \Auth::user()->id)->pluck('from_user_id');
            $users = User::whereIn('id', $fromUserIds)->get();
        }

        return view('pages.follow.index', [
            'users' => $users
        ]);
    }

    public function store(Request $request)
    {
        Follow::create([
            'from_user_id'   => \Auth::user()->id,
            'to_user_id'     => $request->input('to_user_id')
        ]);

        return redirect()->back();
    }

    public function destroy(Request $request, $id)
    {
        $follow = Follow::where('id', $id)->first();
        $follow->delete();

        return redirect()->back();
    }
}
