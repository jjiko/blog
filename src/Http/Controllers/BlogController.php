<?php namespace Jiko\Blog\Http\Controllers;

use Jiko\Blog\Tag;
use Jiko\Http\Controllers\Controller;
use Jiko\Models\Blog\Post;

use Jiko\Blog\Term;

class BlogController extends Controller
{
  public function index($status = 200)
  {
    $wp_posts = Post::published()->orderby('post_date', 'desc')->paginate(20);
    $this->page->title = config('blog.home.title');
    $this->page->description = config('blog.home.description');
    view()->share([
      'response' => (object)[
        'status' => $status
      ]
    ]);
    $view_data = ['wp_posts' => $wp_posts];
    return response($this->setContent('blog::index', $view_data), $status);
  }

  public function legacy($b_slug)
  {
    if ($route = Post::where('post_name', $b_slug)->first()) {
      // check for post
      return redirect()->route('blog_post_slug', [$route->ID, $route->post_name], 301);
    }

    // check for category
    if ($route = Term::where('slug', $b_slug)->first()) {
      return redirect()->route('blog_category', [$route->slug], 301);
    }

    return $this->index(404);
  }

  public function category($slug = null)
  {
    if (!empty($slug)) {
      $wp_posts = Post::taxonomy('category', $slug)->where('post_type', 'post')->distinct()->limit(30)->get();
      $this->page->title = 'Blog posts categorized as ' . $slug;

      return view('blog::layout')->nest('content', 'blog::index', ['wp_posts' => $wp_posts, 'response' => (object)['status' => 200]]);
    }
  }

  public function tag($slug = null)
  {
//    $wp_posts = Post::taxonomy('post_tag', $slug)->with('taxonomies')->get();
    $wp_posts = Post::taxonomy('post_tag', $slug)->get();
    $this->page->title = 'Blog posts tagged with ' . $slug;
    return view('blog::layout')->nest('content', 'blog::index', ['wp_posts' => $wp_posts, 'response' => (object)['status' => 200]]);
  }

  public function tags()
  {
    $wp_tags = Tag::all();
    dd($wp_tags);
  }

  public function show($id, $slug = null)
  {
    $wp_post = Post::find($id);
    $this->page->title = $wp_post->category->name . ": " . $wp_post->post_title;
    return view('blog::layout')->nest('content', 'blog::show', ['post' => $wp_post]);
  }
}