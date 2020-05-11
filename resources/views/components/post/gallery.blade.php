<div class="c-post-gallery">
  <div class="gallery">

    @foreach($posts as $post)
      <div class="gallery-item" tabindex="0">

        <img src="{{ $post->img_url }}" class="gallery-image" alt="">

        <div class="gallery-item-info">

          <ul>
            <li class="gallery-item-likes"><span class="visually-hidden">Likes:</span><i class="fas fa-heart" aria-hidden="true"></i> {{ count($post->likes) }}</li>
            <li class="gallery-item-comments"><span class="visually-hidden">Comments:</span><i class="fas fa-comment" aria-hidden="true"></i> {{ count($post->comments) }}</li>
          </ul>

        </div>

      </div>
    @endforeach
  </div>
</div>
  <!-- End of gallery -->