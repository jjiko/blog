<h1>Categories</h1>
<div class="row">
    @foreach($wp_categories as $category)
        <div class="col-md-4">
            <a class="btn" href="{{ route('blog_category', [$category->term->slug]) }}">{{ $category->term->name }} ({{ $category->count }})</a>
        </div>
    @endforeach
</div>