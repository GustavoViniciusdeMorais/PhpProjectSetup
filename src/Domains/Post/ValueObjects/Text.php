<?php

namespace gustavo\vinicius\Domains\Post\ValueObjects;

class Text
{
    public string $title;
    public string $body;

    public function __construct(string $title, string $body)
    {
        $this->title = $title;
        $this->body = $body;
    }
}
