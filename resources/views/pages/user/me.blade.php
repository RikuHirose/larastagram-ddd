@extends('layouts.app')

@section('content')
  <div class="p-user-show">

    <div class="c-user-profile">
      <div class="profile">

          <div class="profile-image">

            <img src="{{ $authUser->logo_url }}" alt="">

          </div>

          <div class="profile-user-settings">

            <h1 class="profile-user-name">{{ $authUser->name }}_</h1>

            <button class="profile-edit-btn">Edit Profile</button>

            <button aria-label="profile settings" class="btn profile-settings-btn" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              <i class="fas fa-cog"></i>
            </button>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>

          </div>

          <div class="profile-stats">

            <ul>
              <li><span class="profile-stat-count">{{ count($authUser->posts) }}</span> posts</li>
              <li>
                <a href="{{ route('follows.index', ['type' => 'followers']) }}">
                  <span class="profile-stat-count">{{ count($authUser->followers) }}</span> followers
                </a>
              </li>
              <li>
                <a href="{{ route('follows.index', ['type' => 'following']) }}">
                  <span class="profile-stat-count">{{ count($authUser->following) }}</span> following</li>
                </a>
            </ul>

          </div>

          <div class="profile-bio">

            <p><span class="profile-real-name">{{ $authUser->name }}</span> Lorem ipsum dolor sit, amet consectetur adipisicing elit 📷✈️🏕️</p>

          </div>

      </div>
    </div>
    <!-- End of profile section -->
    @include('components.post.gallery', ['posts' => $authUser->posts])
  </div>
@endsection