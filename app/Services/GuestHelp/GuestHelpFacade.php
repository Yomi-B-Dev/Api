<?php

namespace App\Services\GuestHelp;

use \Illuminate\Support\Facades\Facade;

class GuestHelpFacade extends Facade {

    /**
     * Get the registered name of the component. This tells $this->app what record to return
     * (e.g. $this->app[‘guestHelpService’])
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'guestHelpService'; }

}