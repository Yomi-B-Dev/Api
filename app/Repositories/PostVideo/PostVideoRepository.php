<?php

namespace App\Repositories\PostVideo;

use Illuminate\Database\Eloquent\Model;

class PostVideoRepository implements PostVideoInterface
{
    protected $postVideoModel;

    public function __construct(Model $postVideo)
    {
        $this->postVideoModel = $postVideo;
    }

    public function getById($postVideoId)
    {
        return $this->postVideoModel->find($postVideoId);
    }
}