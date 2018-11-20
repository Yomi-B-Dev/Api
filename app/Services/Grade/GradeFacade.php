<?php

namespace App\Services\Grade;

use \Illuminate\Support\Facades\Facade;

class GradeFacade extends Facade {

    /**
     * Get the registered name of the component. This tells $this->app what record to return
     * (e.g. $this->app[‘gradeService’])
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'gradeService'; }

}