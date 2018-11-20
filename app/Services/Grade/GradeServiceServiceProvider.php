<?php

namespace App\Services\Grade;

use Illuminate\Support\ServiceProvider;

class GradeServiceServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('gradeService', function($app) {
            return new GradeService(
                $app->make('App\Repositories\Grade\GradeInterface')
            );
        });
    }
}