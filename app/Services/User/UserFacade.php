<?php

namespace App\Services\User;

use \Illuminate\Support\Facades\Facade;

class UserFacade extends Facade {

    /**
     * Get the registered name of the component. This tells $this->app what record to return
     * (e.g. $this->app[‘userService’])
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'userService'; }

}