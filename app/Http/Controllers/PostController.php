<?php

namespace App\Http\Controllers;


use App\Services\Post\PostFacade;

class PostController extends ApiResponseController
{
    public function get()
    {
        $postId = request('post_id');

        return PostFacade::get($postId);
    }
}
