<?php

namespace Jiko\Blog\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Input;

class RouteServiceProvider extends ServiceProvider
{
  /**
   * This namespace is applied to the controller routes in your routes file.
   *
   * In addition, it is set as the URL generator's root namespace.
   *
   * @var string
   */
  protected $namespace = 'Jiko\Blog\Http\Controllers';

  /**
   * Define your route model bindings, pattern filters, etc.
   *
   * @param  \Illuminate\Routing\Router $router
   * @return void
   */
  public function boot(Router $router)
  {
    parent::boot($router);
  }

  /**
   * Define the routes for the application.
   *
   * @param  \Illuminate\Routing\Router $router
   * @return void
   */
  public function map(Router $router)
  {
    if (!$this->app->routesAreCached()) {
      // Handle legacy routes
      $router->get('blog/wp-content/uploads/{img_ref_path}', function($img_ref_path){
        return file_get_contents(img_path($img_ref_path));
      });

      $router->group(['namespace' => $this->namespace], function ($router) {
        if (in_array(Input::server('HTTP_HOST'), ['www.joejiko.com', 'local.joejiko.com'])) {
          require_once(__DIR__ . '/../Http/routes.php');;
        }
      });
    }
  }
}
