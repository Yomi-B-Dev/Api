<?php

namespace App\Services\PostImage;

use \Illuminate\Support\Facades\Facade;

class PostImageFacade extends Facade {

    /**
     * Get the registered name of the component. This tells $this->app what record to return
     * (e.g. $this->app[‘postImageService’])
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'postImageService'; }

}