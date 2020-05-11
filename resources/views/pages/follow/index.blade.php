@extends('layouts.app')

@section('content')
    <div class="p-follow-index">
        @foreach($users as $user)
            <div class="post">
                <div class="name">
                    <a href="{{ route('users.show', $user->id) }}">
                        <img src="{{ $user->logo_url }}" class="profile-img"/>
                        <p>
                            {{ $user->name }}
                        </p>
                    </a>
                </div>

                @if($user->is_follow)
                  <form action="{{ route('follows.destroy', $user->follow_id) }}" method="POST" style="display: contents;">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <button class="m-btn" btn-type="follow" type="submit" style="padding: 4px 0; background-color: rgb(29, 161, 242); color: #fff;">unfollow</button>
                  </form>
                @else
                  <form action="{{ route('follows.store') }}" method="POST" style="display: contents;">
                    @csrf
                    <input type="hidden" name="to_user_id" value="{{ $user->id }}">
                    <button class="m-btn" btn-type="follow" type="submit" style="padding: 4px 0;">follow</button>
                  </form>
                @endif
            </div>
        @endforeach
    </div>
@endsection
