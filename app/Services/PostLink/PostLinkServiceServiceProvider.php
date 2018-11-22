<?php

namespace App\Services\PostLink;

use Illuminate\Support\ServiceProvider;

class PostLinkServiceServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('postLinkService', function($app) {
            return new PostLinkService(
                $app->make('App\Repositories\PostLink\PostLinkInterface')
            );
        });
    }
}