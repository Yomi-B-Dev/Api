<?php

namespace App\Services\Post;


use App\Repositories\Post\PostInterface;

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

        $items = [];

        foreach ($posts as $post)
        {
            dd($post->user->all(['id']));
            array_push($items, $this->extractItem($post));
        }

//        dd($items);

        return [
            'totalPages' => $totPages,
            'items' => $items
        ];
    }

    private function extractItem($el)
    {
        return [
            'id' => $el['id'],
            'view_count' => $el['view_count'],
            'target' => $el['target'],
            'author' => [
                $el->user(['id', 'name'])
            ],
            'title' => $el['title'],
            'content' => $el['content'],
            'timestamp' => $el['timestamp'],
            'type' => $el['type'],
            'link' => $this->extractLink($el),
            'media' => $this->extractMedia($el)
        ];
    }

    private function extractLink($el)
    {
        $link = $el->postLink();
        if ($link) {

            return [
                'title' => $link['title'],
                'url' => $link['url'],
            ];

        }
    }

    private function extractMedia($el)
    {
        $video = $el->postVideo();
        if ($video) {

            return [
                'type' => 'video',
                'urls' => [
                    'url' => $video['url'],
                    'thumbnail' => $video['thumbnail'],
                ]
            ];

        }

        $images = $el->postImage();
        if ($images) {
            $urls = $images->all('url');

            return [
                'type' => 'images',
                'urls' => $urls
            ];

        }
    }

}
