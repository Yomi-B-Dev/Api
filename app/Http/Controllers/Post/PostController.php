<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\ApiResponse\ApiResponseController;
use App\Services\Post\PostFacade;

class PostController extends ApiResponseController
{
    public function report()
    {
        $postId = request('post_id');

        if (PostFacade::get($postId)) {
            return $this->success("TRUE");
        }

        return $this->error("POST_NOT_FOUND");
    }

    public function getByPage()
    {
        $page = request('page');
        return $this->success(PostFacade::getByPage($page));

        return PostFacade::getByPage($page);
    }
}
