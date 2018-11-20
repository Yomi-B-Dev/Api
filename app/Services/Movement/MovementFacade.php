<?php

namespace App\Services\Movement;

use \Illuminate\Support\Facades\Facade;

class MovementFacade extends Facade {

    /**
     * Get the registered name of the component. This tells $this->app what record to return
     * (e.g. $this->app[‘movementService’])
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'movementService'; }

}