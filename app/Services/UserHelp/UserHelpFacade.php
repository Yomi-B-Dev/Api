<?php

namespace App\Services\UserHelp;

use \Illuminate\Support\Facades\Facade;

class UserHelpFacade extends Facade {

    /**
     * Get the registered name of the component. This tells $this->app what record to return
     * (e.g. $this->app[‘userHelpService’])
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'userHelpService'; }

}