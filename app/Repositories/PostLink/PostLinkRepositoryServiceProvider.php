<?php

namespace App\Repositories\PostLink;

use App\Models\Entities\PostLink;
use Illuminate\Support\ServiceProvider;

class PostLinkRepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('App\Repositories\PostLink\PostLinkInterface', function($app) {
            return new PostLinkRepository(new PostLink());
        });
    }
}