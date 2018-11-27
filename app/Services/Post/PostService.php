<?php

namespace App\Services\Post;


use App\Repositories\Post\PostInterface;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;

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
        $totPages = (integer)ceil(($this->postRepo->getAll()->count() / 10));
        if ($page) {
            $posts = $this->postRepo->getByPage($page, 10);
        } else {
            $posts = $this->postRepo->getAll();
        }

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

}
