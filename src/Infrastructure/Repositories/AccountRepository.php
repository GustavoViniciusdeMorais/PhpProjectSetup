<?php

namespace gustavo\vinicius\Infrastructure\Repositories;

use gustavo\vinicius\Domain\Accounts\Entities\Account;
use gustavo\vinicius\Domain\Accounts\ValueObjects\Money;
use gustavo\vinicius\Domain\Accounts\Repositories\IAccountRepository;

class AccountRepository implements IAccountRepository
{
    // Get data from source (DB, InMemory)
    protected $accounts = [
        [
            'balance' => 5000,
            'limit' => 10000
        ]
    ];

    public function findAll()
    {
        $result = [];
        foreach($this->accounts as $account) {
            $result[] = new Account(
                new Money($account['balance'], 'dollar'),
                new Money($account['limit'], 'dollar')
            );
        }
        return $result;
    }
}
