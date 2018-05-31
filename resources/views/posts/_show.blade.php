<div class="row no-gutters margin-b-m">
  <div class="post col">
    @if ($post->hasThumbnail())
      <a href="{{ route('posts.show', $post)}}">
        {{ Html::image($post->thumbnail->getUrl('thumb'), $post->thumbnail->name, ['class' => 'card-img-top']) }}
      </a>
    @endif

    <div class="post-body">
      <h4 v-pre class="post-title">
          <a class="text-light" href="{{ route('posts.show', $post) }}">{{ $post->title }}</a>
      </h4>

      <p class="post-text">
          <small v-pre class="text-muted">
              <a class="text-grey-light" href="{{ route('users.show', $post->author) }}">{{ $post->author->fullname }}</a>
          </small>

          <small class="text-muted">- {{ humanize_date($post->posted_at) }}</small><br>
      </p>

      <p class="post-text">
      </p>
    </div>
  </div>
</div>
