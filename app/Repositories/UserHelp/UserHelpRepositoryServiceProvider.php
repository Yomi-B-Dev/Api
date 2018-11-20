<?php

namespace App\Repositories\UserHelp;

use App\Models\Entities\UserHelp;
use Illuminate\Support\ServiceProvider;

class UserHelpRepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('App\Repositories\UserHelp\UserHelpInterface', function($app) {
            return new UserHelpRepository(new UserHelp());
        });
    }
}