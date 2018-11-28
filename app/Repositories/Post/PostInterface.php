<?php

namespace App\Repositories\Post;

interface PostInterface
{
    public function getById($postId);
    public function getByPage($page, $postsPerPage);
    public function getAll();
    public function getAllowed($user);
    public function create($data);
    public function update($data, $values);
    public function delete($id);
}