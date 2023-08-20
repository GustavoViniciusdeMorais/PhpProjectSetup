<?php

namespace gustavo\vinicius\UseCases\SearchAccount;

class SearchAccountInput
{
    public string $id;
    public function __construct(string $id)
    {
        $this->id = $id;
    }
}