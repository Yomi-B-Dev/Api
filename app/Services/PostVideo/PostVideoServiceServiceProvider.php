<?php

namespace App\Services\PostVideo;

use Illuminate\Support\ServiceProvider;

class PostVideoServiceServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('postVideoService', function($app) {
            return new PostVideoService(
                $app->make('App\Repositories\PostVideo\PostVideoInterface')
            );
        });
    }
}