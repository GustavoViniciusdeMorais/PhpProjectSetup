<?php

namespace gustavo\vinicius\Default\Actions;

abstract class AbAction
{
    protected $data;

    public function __invoke()
    {
        return $this->execute();
    }

    public function withData($data)
    {
        $this->$data = $data;
        return $this;
    }

    abstract public function execute(): mixed;
}
