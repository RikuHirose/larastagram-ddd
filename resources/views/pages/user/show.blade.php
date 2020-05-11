@extends('layouts.app')

@section('content')
  <div class="p-user-show">

    <div class="c-user-profile">
      <div class="profile">

          <div class="profile-image">

            <img src="{{ $user->logo_url }}" alt="">

          </div>

          <div class="profile-user-settings">

            <h1 class="profile-user-name">{{ $user->name }}_</h1>

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

          <div class="profile-stats">

            <ul>
              <li><span class="profile-stat-count">{{ count($user->posts) }}</span> posts</li>
              <li><span class="profile-stat-count">{{ count($user->followers) }}</span> followers</li>
              <li><span class="profile-stat-count">{{ count($user->following) }}</span> following</li>
            </ul>

          </div>

          <div class="profile-bio">

            <p><span class="profile-real-name">Jane Doe</span> Lorem ipsum dolor sit, amet consectetur adipisicing elit 📷✈️🏕️</p>

          </div>

      </div>
    </div>
    <!-- End of profile section -->
    @include('components.post.gallery', ['posts' => $user->posts])
  </div>
@endsection