<?php

namespace App\Services\Leadership;

use \Illuminate\Support\Facades\Facade;

class LeadershipFacade extends Facade {

    /**
     * Get the registered name of the component. This tells $this->app what record to return
     * (e.g. $this->app[‘leadershipService’])
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'leadershipService'; }

}