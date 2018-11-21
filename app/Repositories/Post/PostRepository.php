<?php

namespace App\Repositories\Post;

use Illuminate\Database\Eloquent\Model;

class PostRepository implements PostInterface
{
    protected $postModel;

    public function __construct(Model $post)
    {
        $this->postModel = $post;
    }

    public function getById($postId)
    {
        return $this->postModel->find($postId);
    }
}