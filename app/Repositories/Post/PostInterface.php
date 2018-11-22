<?php

namespace App\Repositories\Post;

interface PostInterface
{
    public function getById($postId);
    public function getByPage($page, $postsPerPage);
    public function getAll();
}