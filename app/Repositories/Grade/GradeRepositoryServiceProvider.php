<?php

namespace App\Repositories\Grade;

use App\Models\Entities\Grade;
use Illuminate\Support\ServiceProvider;

class GradeRepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('App\Repositories\Grade\GradeInterface', function($app) {
            return new GradeRepository(new Grade());
        });
    }
}