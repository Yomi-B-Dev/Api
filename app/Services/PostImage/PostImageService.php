<?php

namespace App\Services\PostImage;

use App\Repositories\PostImage\PostImageInterface;

class PostImageService
{
    protected $postImageRepo;

    public function __construct(PostImageInterface $postImageRepo)
    {
        $this->postImageRepo = $postImageRepo;
    }

    public function get($postImageId)
    {
        return $this->postImageRepo->getById($postImageId);
    }
}