<?php

namespace gustavo\vinicius\Posts\Actions;

use gustavo\vinicius\Default\Actions\AbAction;
use gustavo\vinicius\Posts\Domains\Entities\Post;
use gustavo\vinicius\Default\Responders\JsonResponder;

class ListPostsAction extends AbAction
{
    public function execute(): mixed
    {
        // get data from model
        $posts = Post::all();
        return JsonResponder::response($posts);
    }
}
