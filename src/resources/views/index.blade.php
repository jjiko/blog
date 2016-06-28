@if($response->status == 404)
    <div class="alert alert-danger">
        <p>You typed the URL wrong.. or maybe this page is missing.</p>
    </div>
@endif
<div id="primary" class="content-area">
    <section id="blog" class="site-main" role="main">
        <div class="posts">
            <?php foreach ($wp_posts as $post): ?>
            @include('blog::partials.post')
            <?php endforeach; ?>
        </div>
    </section>
</div>

<div class="alert alert-info">
    <p class="text-small">Older posts unavailable.</p>
</div>

@section('sidebars.content')
    @include('ads.google-responsive')
@stop