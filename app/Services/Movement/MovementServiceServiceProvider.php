<?php

namespace App\Services\Movement;

use Illuminate\Support\ServiceProvider;

class MovementServiceServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('movementService', function($app) {
            return new MovementService(
                $app->make('App\Repositories\Movement\MovementInterface')
            );
        });
    }
}