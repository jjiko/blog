<article class="<?php echo $post->post_type; ?>" itemscope itemtype="https://schema.org/Article"
         data-entry-type="<?php echo $post->post_type ?>" data-mime-type="<?php echo $post->post_mime_type ?>">
    <meta itemscope itemprop="mainEntityOfPage" itemType="https://schema.org/WebPage"
          itemid="https://www.joejiko.com/b"/>
    <meta itemprop="author" content="Joe Jiko">
    <div itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
        <div itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
            <meta itemprop="url" content="https://cdn.joejiko.com/img/shared/brand/logos/logo720.png">
            <meta itemprop="width" content="720">
            <meta itemprop="height" content="720">
        </div>
        <meta itemprop="name" content="Joe Jiko">
    </div>
    <div itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
        <meta itemprop="url" content="https://cdn.joejiko.com/img/shared/brand/logos/logo720.png">
        <meta itemprop="width" content="720">
        <meta itemprop="height" content="720">
    </div>
    <meta itemprop="keywords" content="">
    <header class="row post-header">
        <div class="col-sm-12 post-category">
            @if($post->category)
                / <a class="post-category-link"
                     href="<?php echo route('blog_category', [$post->category->slug], false) ?>">
              <?php echo $post->category->name ?>
                </a>
            @else
                / <a class="post-category-link"
                     href="<?php echo route('blog_category', ['uncategorized'], false) ?>">
                    Uncategorized
                </a>
            @endif
        </div>
        <div class="col-sm-12 post-keywords">
            <meta name="keywords" content="{{ $post->tagsList }}">
            @foreach($post->tags as $tag)
                <a class="btn btn-link" href="/b/tag/{{ $tag->slug }}">#{{ $tag->name }}</a>
            @endforeach
        </div>
    </header>
    <h2 class="post-title" itemprop="headline">
        <a href="<?php echo route('blog_post_slug', [$post->ID, $post->post_name], false) ?>">
          <?php echo $post->post_title; ?>
        </a>
    </h2>
    <div class="post-body" itemprop="articleBody">
        {!! $post->filtered_post_content() !!}
    </div>
    <footer class="row post-footer">
        <div class="col-sm-12 timestamps" hidden>
            <div class="col-sm-6">
                <meta itemprop="datePublished" content="<?php echo $post->post_date;?>">
                <small>published:
                    <time itemprop="dateCreated"
                          datetime="<?php echo $post->post_date; ?>"><?php echo $post->post_date; ?></small>
            </div>
            <div class="col-sm-6">
                <small>updated:
                    <time itemprop="dateModified"
                          datetime="<?php echo $post->post_modified;?>"><?php echo $post->post_modified; ?></time>
                </small>
            </div>
        </div>
    </footer>
</article>