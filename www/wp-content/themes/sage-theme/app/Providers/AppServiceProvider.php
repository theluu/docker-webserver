<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Capsule\Manager as Capsule;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $capsule = new Capsule;
        $capsule->addConnection([
            'driver'    => 'mysql',
            'host'      => env('WORDPRESS_DB_HOST', 'mysql'),
            'database'  => env('WORDPRESS_DB_NAME', 'wordpress'),
            'username'  => env('WORDPRESS_DB_USER', 'wpuser'),
            'password'  => env('WORDPRESS_DB_PASSWORD', 'wppass123'),
            'charset'   => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix'    => 'soccer_',  // Prefix để tránh xung đột với WP tables
        ]);
        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }
}
