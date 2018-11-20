<?php

namespace App\Repositories\GuestHelp;

use App\Models\Entities\GuestHelp;
use Illuminate\Support\ServiceProvider;

class GuestHelpRepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('App\Repositories\GuestHelp\GuestHelpInterface', function() {
            return new GuestHelpRepository(new GuestHelp());
        });
    }
}