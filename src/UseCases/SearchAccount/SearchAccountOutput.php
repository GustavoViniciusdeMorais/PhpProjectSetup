<?php

namespace gustavo\vinicius\UseCases\SearchAccount;

use gustavo\vinicius\Domain\Accounts\Entities\Account;
use gustavo\vinicius\Domain\Accounts\ValueObjects\Money;

class SearchAccountOutput
{
    public Account $account;

    public function __construct(int $balance, int $limit)
    {
        $this->account = new Account(
            new Money($balance, 'dollar'),
            new Money($limit, 'dollar')
        );
    }
}
