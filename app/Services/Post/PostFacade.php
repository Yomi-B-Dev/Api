<?php

namespace App\Services\Post;

use \Illuminate\Support\Facades\Facade;

class PostFacade extends Facade {

    /**
     * Get the registered name of the component. This tells $this->app what record to return
     * (e.g. $this->app[‘postService’])
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'postService'; }

}