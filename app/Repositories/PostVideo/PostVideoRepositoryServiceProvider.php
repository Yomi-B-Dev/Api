<?php

namespace App\Repositories\PostVideo;

use App\Models\Entities\PostVideo;
use Illuminate\Support\ServiceProvider;

class PostVideoRepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('App\Repositories\PostVideo\PostVideoInterface', function($app) {
            return new PostVideoRepository(new PostVideo());
        });
    }
}