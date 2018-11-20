<?php

namespace App\Services\UserHelp;

use Illuminate\Support\ServiceProvider;

class UserHelpServiceServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('userHelpService', function($app) {
            return new UserHelpService(
                $app->make('App\Repositories\UserHelp\UserHelpInterface')
            );
        });
    }
}