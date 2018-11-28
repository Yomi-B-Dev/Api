<?php

namespace App\Services\Post;


use App\Repositories\Post\PostInterface;
use function foo\func;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

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

    public function getByPage($page)
    {
        $posts = null;
//        $val = 0;
//        dd(); // Getting 'grade'
        $totPages = (integer)ceil(($this->postRepo->getAll()->count() / 10));
        if ($page) {
            $posts = $this->postRepo->getByPage($page, 10);
        } else {
            $posts = $this->postRepo->getAll();
        }

//        dd($posts->first()['user']); // ! IMPORTANT - Can access property like first()->user

        return [
            'totalPages' => $totPages,
            'items' => $posts->map([$this, 'extractItem'])
        ];
    }

    function extractItem($post)
    {
        $user = $post->user;

        return [
            'id' => $post['id'],
            'view_count' => $post['view_count'],
            'target' => $post['target'],
            'author' => [
                'id' => $user->id,
                'name' => $user->name
            ],
            'title' => $post['title'],
            'content' => $post['content'],
            'timestamp' => $post['timestamp'],
            'type' => $post['type'],
            'link' => $this->extractLink($post),
            'media' => $this->extractMedia($post)
        ];
    }

    private function extractLink($post)
    {
        $link = $post->postLink;
        if ($link) {

            return [
                'title' => $link->title,
                'url' => $link->url
            ];
        }

        return null;
    }

    private function extractMedia($post)
    {
        $video = $post->postVideo;
        if ($video) {

            return [
                'type' => 'video',
                'urls' => [
                    'url' => $video->url,
                    'thumbnail' => $video->thumbnail
                ]
            ];

        }

        $images = $post->postImages;

        return $images ? $images->pluck('url') : null;
    }

    public function isInputPositiveIntOrNull($input)
    {
        return is_null($input) or (is_numeric($input) and ($input == (integer)$input) and $input > 0);
    }

    private function filterPosts($posts, $user)
    {
        $viewer_role_id = $user->role_id;
        $role = Config::get('constants.roles.'.$viewer_role_id);

//        return $posts->filter(function ($post) use ($viewer_role_id) {
//            $owner_role_id = $post->user->role_id ;
//            if ($owner_role_id >= $viewer_role_id) {
//                return false;
//            } elseif () {
//
//            } else return true;
//        })->all();
    }

}
