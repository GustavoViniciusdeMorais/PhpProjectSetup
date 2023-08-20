<?php

namespace gustavo\vinicius\Infrastructure\Repositories;

use gustavo\vinicius\Domains\Post\Entities\Post;

class PostRepository
{
    protected $posts = [
        [
            'title' => 'Example',
            'body' => 'Example'
        ]
    ];

    public function all()
    {
        $result = [];

        foreach ($this->posts as $key => $post) {
            $result[] = new Post($post['title'], $post['body']);
        }

        return $result;
    }
}
