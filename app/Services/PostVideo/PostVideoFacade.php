<?php

namespace App\Services\PostVideo;

use \Illuminate\Support\Facades\Facade;

class PostVideoFacade extends Facade {

    /**
     * Get the registered name of the component. This tells $this->app what record to return
     * (e.g. $this->app[‘postVideoService’])
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'postVideoService'; }

}