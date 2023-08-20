<?php

namespace gustavo\vinicius\Domains\Post\Entities;

use gustavo\vinicius\Domains\Post\ValueObjects\Text;

class Post
{
    public Text $text;

    public function __construct(string $title, string $body)
    {
        $this->text = new Text($title, $body);
    }

    public function validateTitle(): bool
    {
        return true;
    }
}
