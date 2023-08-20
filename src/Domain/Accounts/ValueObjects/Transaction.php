<?php

namespace gustavo\vinicius\Domain\Accounts\ValueObjects;

use DateTime;

class Transaction
{
    protected string $type;
    protected int $value;
    protected DateTime $date;

    public function __construct(string $type, int $value, DateTime $date)
    {
        $this->type = $type;
        $this->value = $value;
        $this->date = $date;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function getDate()
    {
        return $this->date;
    }
}
