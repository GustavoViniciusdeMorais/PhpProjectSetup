<?php
declare(strict_types=1);

namespace Gustavo\User\Infrastructure\Actions;

use Gustavo\Common\Application\Actions\Action;
use Gustavo\User\Domains\UserRepository;
use Psr\Log\LoggerInterface;

abstract class UserAction extends Action
{
    public function __construct(
        LoggerInterface $logger,
        protected UserRepository $user_repository,
    ) {
        parent::__construct($logger);
    }
}
