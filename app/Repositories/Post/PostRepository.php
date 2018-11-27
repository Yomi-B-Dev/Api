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

    public function getByPage($page, $postsPerPage)
    {
        return $this->postModel->skip($page * $postsPerPage)->take($postsPerPage)->get();
    }

    public function getAll()
    {
        return $this->postModel->all();
    }
}
