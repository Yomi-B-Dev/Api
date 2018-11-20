<?php

namespace App\Repositories\Movement;

use App\Models\Entities\Movement;
use Illuminate\Support\ServiceProvider;

class MovementRepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('App\Repositories\Movement\MovementInterface', function($app) {
            return new MovementRepository(new Movement());
        });
    }
}