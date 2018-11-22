<?php

namespace App\Repositories\PostImage;

use App\Models\Entities\PostImage;
use Illuminate\Support\ServiceProvider;

class PostImageRepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('App\Repositories\PostImage\PostImageInterface', function($app) {
            return new PostImageRepository(new PostImage());
        });
    }
}