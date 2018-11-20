<?php

namespace App\Services\Tribe;

use \Illuminate\Support\Facades\Facade;

class TribeFacade extends Facade {

    /**
     * Get the registered name of the component. This tells $this->app what record to return
     * (e.g. $this->app[‘tribeService’])
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'tribeService'; }

}