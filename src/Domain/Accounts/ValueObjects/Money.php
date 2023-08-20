<?php

namespace gustavo\vinicius\Domain\Accounts\ValueObjects;

class Money
{
    protected int $value;
    protected string $currency;

    public function __construct(int $value, string $currency)
    {
        $this->value = $value;
        $this->currency = $currency;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function getCurrency()
    {
        return $this->currency;
    }
}
