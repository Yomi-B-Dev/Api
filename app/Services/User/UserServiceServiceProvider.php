<?php

namespace App\Services\User;

use Illuminate\Support\ServiceProvider;

class UserServiceServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('userService', function($app) {
            return new UserService(
                $app->make('App\Repositories\User\UserInterface')
            );
        });
    }
}