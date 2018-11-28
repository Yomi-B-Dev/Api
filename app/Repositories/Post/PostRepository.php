<?php

namespace App\Repositories\Post;

use App\PostAudience;
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

    public function create($post)
    {
       return $this->postModel->create($post);
    }

    public function update($post, $values)
    {
        return $post->update($values);
    }

    public function delete($id)
    {
        return $this->postModel->find($id)->delete();
    }

    public function getAllowed($user)
    {
//        return $this->postModel->where()->get();
    }
}
