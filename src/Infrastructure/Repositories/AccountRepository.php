<?php

namespace gustavo\vinicius\Infrastructure\Repositories;

use gustavo\vinicius\Domain\Accounts\Entities\Account;
use gustavo\vinicius\Domain\Accounts\ValueObjects\Money;
use gustavo\vinicius\Domain\Accounts\Repositories\IAccountRepository;

class AccountRepository implements IAccountRepository
{
    // Get data from source (DB, InMemory)
    protected $accounts = [
        1 => [
            'balance' => 5000,
            'limit' => 10000
        ],
        2 => [
            'balance' => 6000,
            'limit' => 12000
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

    public function findById(int $id)
    {
        $result = false;
        $accounts = $this->findAll();
        if (isset($accounts[$id])) {
            $result = $accounts[$id];
        }
        return $result;
    }
}
