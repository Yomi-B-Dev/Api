<?php

namespace App\Repositories\PostImage;

use Illuminate\Database\Eloquent\Model;

class PostImageRepository implements PostImageInterface
{
    protected $postImageModel;

    public function __construct(Model $postImage)
    {
        $this->postImageModel = $postImage;
    }

    public function getById($postImageId)
    {
        return $this->postImageModel->find($postImageId);
    }
}