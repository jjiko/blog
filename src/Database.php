<?php

/**
 * Jiko\Blog\Database
 *
 * @author Junior Grossi <juniorgro@gmail.com>
 */

namespace Jiko\Blog;

use Illuminate\Database\Capsule\Manager as Capsule;

class Database
{
    /**
     * Default params. Wordpress use by default MySQL databases and more.
     *
     * Override: config/blog.php
     */
    protected static $baseParams;

    function __construct() {
        self::$baseParams = [
          'driver' => config('blog.driver') ?: 'mysql',
          'host' => config('blog.host') ?: 'localhost',
          'charset' => config('blog.charset') ?: 'utf8',
          'collation' => config('blog.collation') ?: 'utf8_unicode_ci',
          'prefix' => config('blog.prefix') ?: 'wp_',
        ];

        parent::__construct();
    }

    /**
     * Connect to the Wordpress database
     *
     * @param array $params
     * @return Illuminate\Database\Capsule\Manager
     */
    public static function connect(array $params)
    {
        $capsule = new Capsule;
        $params = array_merge(static::$baseParams, $params);
        $capsule->addConnection($params);
        $capsule->bootEloquent();

        return $capsule;
    }
}
