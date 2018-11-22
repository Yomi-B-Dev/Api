<?php

namespace App\Services\PostLink;

use \Illuminate\Support\Facades\Facade;

class PostLinkFacade extends Facade {

    /**
     * Get the registered name of the component. This tells $this->app what record to return
     * (e.g. $this->app[‘postLinkService’])
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'postLinkService'; }

}