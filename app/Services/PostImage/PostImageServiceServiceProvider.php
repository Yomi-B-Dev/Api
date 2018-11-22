<?php

namespace App\Services\PostImage;

use Illuminate\Support\ServiceProvider;

class PostImageServiceServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('postImageService', function($app) {
            return new PostImageService(
                $app->make('App\Repositories\PostImage\PostImageInterface')
            );
        });
    }
}