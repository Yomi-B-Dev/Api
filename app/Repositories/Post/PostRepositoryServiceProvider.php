<?php

namespace App\Repositories\Post;

use App\Models\Entities\Post;
use Illuminate\Support\ServiceProvider;

class PostRepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('App\Repositories\Post\PostInterface', function($app) {
            return new PostRepository(new Post());
        });
    }
}