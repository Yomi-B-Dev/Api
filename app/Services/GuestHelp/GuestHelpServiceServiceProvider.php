<?php

namespace App\Services\GuestHelp;

use Illuminate\Support\ServiceProvider;

class GuestHelpServiceServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('guestHelpService', function($app) {
            return new GuestHelpService(
                $app->make('App\Repositories\GuestHelp\GuestHelpInterface')
            );
        });
    }
}