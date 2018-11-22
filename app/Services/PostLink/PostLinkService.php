<?php

namespace App\Services\PostLink;

use App\Repositories\PostLink\PostLinkInterface;

class PostLinkService
{
    protected $postLinkRepo;

    public function __construct(PostLinkInterface $postLinkRepo)
    {
        $this->postLinkRepo = $postLinkRepo;
    }

    public function get($postLinkId)
    {
        return $this->postLinkRepo->getById($postLinkId);
    }
}