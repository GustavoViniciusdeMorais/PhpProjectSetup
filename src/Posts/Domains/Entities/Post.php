<?php

namespace gustavo\vinicius\Posts\Domains\Entities;

class Post
{
    protected $table = 'post';

    public static function all()
    {
        return [
            [
                'name' => 'post 1'
            ]
        ];
    }
}
