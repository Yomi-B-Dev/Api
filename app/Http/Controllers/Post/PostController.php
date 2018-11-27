<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\ApiResponse\ApiResponseController;
use App\Services\Post\PostFacade;
use Illuminate\Support\Facades\Validator;

class PostController extends ApiResponseController
{
    public function report()
    {
        $postId = request('post_id');

        if (is_int($postId) && $postId > 0 && PostFacade::get($postId)) {
            return $this->success("TRUE");
        }

        return $this->error("POST_NOT_FOUND");
    }

    public function getByPage()
    {
        $page = request()->query('page');

        return PostFacade::isInputPositiveIntOrNull($page) ?
            $this->success(PostFacade::getByPage($page - 1)) :
            $this->error('Page query should be positive integer');
//        return $this->success(PostFacade::getByPage($page));
    }
}
