<?php

namespace App\Repositories\Tribe;

use App\Models\Entities\Tribe;
use Illuminate\Support\ServiceProvider;

class TribeRepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('App\Repositories\Tribe\TribeInterface', function($app) {
            return new TribeRepository(new Tribe());
        });
    }
}