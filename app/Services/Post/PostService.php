<?php

namespace App\Services\Post;

use App\Repositories\Post\PostInterface;

class PostService
{
    protected $postRepo;

    public function __construct(PostInterface $postRepo)
    {
        $this->postRepo = $postRepo;
    }

    public function get($postId)
    {
        return $this->postRepo->getById($postId);
    }
}