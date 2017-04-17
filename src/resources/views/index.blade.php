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

@if(method_exists($wp_posts, 'links'))
    {{ $wp_posts->links() }}
@endif

@section('sidebars.content')
    @if(isset($categories))
        <div class="container">
            <div class="row">
                @foreach($categories as $category)
                    <div class="col-md-12">
                        <a class="btn btn-sm" href="{{ route('blog_category', [$category->term->slug]) }}">
                            {{ $category->term->name }} ({{ $category->count }})
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
@stop