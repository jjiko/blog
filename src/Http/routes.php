<?php
Route::group(['prefix' => 'blog'], function(){
  Route::get('{b_slug}', ['uses' =>'BlogController@legacy'])
    ->where('b_slug', '.*');

  Route::get('/', function() {
    return redirect()->route("blog");
  });
});

Route::group(['prefix' => 'b'], function () {
  Route::get('tags', 'BlogController@tags');
  Route::group(['prefix' => 'tag'], function(){
    Route::get('{t_slug}', ['as' => 'blog_tag', 'uses' => 'BlogController@tag'])
      ->where('t_slug', '.*');
  });

  Route::group(['prefix' => 'cat'], function(){
    Route::get('{c_slug}', ['as' => 'blog_category', 'uses' => 'BlogController@category'])
      ->where('c_slug', '.*');
  });

  Route::get('/', ['as' => 'blog', 'uses' => 'BlogController@index']);
  Route::get('{b_id}', ['as' => 'blog_post_id', 'uses' => 'BlogController@show'])
    ->where('b_id', '[0-9]+');
  Route::get('{b_id}-{b_slug}', ['as' => 'blog_post_slug', 'uses' => 'BlogController@show'])
    ->where('b_id', '[0-9]+')
    ->where('b_slug', '.*');
});