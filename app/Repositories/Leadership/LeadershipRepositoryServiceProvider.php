<?php

namespace App\Repositories\Leadership;

use App\Models\Entities\Leadership;
use Illuminate\Support\ServiceProvider;

class LeadershipRepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('App\Repositories\Leadership\LeadershipInterface', function($app) {
            return new LeadershipRepository(new Leadership());
        });
    }
}