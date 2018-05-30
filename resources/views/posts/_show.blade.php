<div class="row no-gutters">
  <div class="post col">
    @if ($post->hasThumbnail())
      <a href="{{ route('posts.show', $post)}}">
        {{ Html::image($post->thumbnail->getUrl('thumb'), $post->thumbnail->name, ['class' => 'card-img-top']) }}
      </a>
    @endif

    <div class="post-body">
      <h4 v-pre class="post-title">
          <a class="text-white" href="{{ route('posts.show', $post) }}">{{ $post->title }}</a>
      </h4>

      <p class="post-text"><small v-pre class="text-muted">{{ link_to_route('users.show', $post->author->fullname, $post->author) }}</small></p>

      <p class="post-text">
        <small class="text-muted">{{ humanize_date($post->posted_at) }}</small><br>
      </p>
    </div>
  </div>
</div>
