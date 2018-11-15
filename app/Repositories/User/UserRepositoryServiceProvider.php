<?php

namespace App\Repositories\User;

use App\User;
use Illuminate\Support\ServiceProvider;

class UserRepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('App\Repositories\User\UserInterface', function() {
            return new UserRepository(new User());
        });
    }
}