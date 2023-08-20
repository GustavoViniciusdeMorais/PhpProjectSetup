<?php

namespace gustavo\vinicius\Domain\Accounts\Entities;

use gustavo\vinicius\Domain\Accounts\ValueObjects\Money;
use gustavo\vinicius\Domain\Accounts\ValueObjects\Transaction;
use DateTime;

class Account
{
    protected Money $balance;
    protected Money $limit;
    protected $transactions = [];

    public function __construct(Money $balance, Money $limit)
    {
        $this->balance = $balance;
        $this->limit = $limit;
    }

    public function withDraw(Money $money)
    {
        $result = false;
        if ($this->limit > $money) {
            $resultValue = $this->limit->getValue() - $money->getValue();
            $this->transactions[] = new Transaction(
                'withDraw', $resultValue, new DateTime()
            );
            $result = true;
        }

        return $result;
    }
}
