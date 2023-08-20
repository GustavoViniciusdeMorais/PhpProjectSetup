<?php

namespace gustavo\vinicius\UseCases\SearchAccount;

use gustavo\vinicius\Infrastructure\Repositories\AccountRepository;

class SearchAccountInteractor
{
    protected AccountRepository $repository;

    public function __construct()
    {
        $this->repository = new AccountRepository();
    }

    public function execute(SearchAccountInput $input): SearchAccountOutput
    {
        $account = $this->repository->findById($input->id);
        if (
            !empty($account)
            && isset($account->balance)
            && isset($account->limit)
        ) {
            return new SearchAccountOutput(
                $account->balance,
                $account->limit
            );
        }

        return new SearchAccountOutput(0,0);
    }
}
