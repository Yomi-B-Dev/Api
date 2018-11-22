<?php

namespace App\Repositories\PostLink;

use Illuminate\Database\Eloquent\Model;

class PostLinkRepository implements PostLinkInterface
{
    protected $postLinkModel;

    public function __construct(Model $postLink)
    {
        $this->postLinkModel = $postLink;
    }

    public function getById($postLinkId)
    {
        return $this->postLinkModel->find($postLinkId);
    }
}