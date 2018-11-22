<?php

namespace App\Services\PostVideo;

use App\Repositories\PostVideo\PostVideoInterface;

class PostVideoService
{
    protected $postVideoRepo;

    public function __construct(PostVideoInterface $postVideoRepo)
    {
        $this->postVideoRepo = $postVideoRepo;
    }

    public function get($postVideoId)
    {
        return $this->postVideoRepo->getById($postVideoId);
    }
}