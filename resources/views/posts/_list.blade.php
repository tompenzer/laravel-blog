@each('posts/_show', $posts, 'post', 'posts/_empty')

<div class="d-flex justify-content-center">
    {{ $posts->links() }}
</div>
