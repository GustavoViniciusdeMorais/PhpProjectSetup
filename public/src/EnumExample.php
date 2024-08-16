<?php

namespace Gustavo\Api;

abstract class Status
{
    abstract public function getRules(): array;
}

class DraftStatus extends Status
{
    public function getRules(): array
    {
        return ['draft'];
    }
}

class DoneStatus extends Status
{
    public function getRules(): array
    {
        return ['done'];
    }
}

enum OrderStatus: string
{
    case Draft = 'draft';
    case Done = 'done';
    public function createStatus(): Status
    {
        return match ($this) {
            self::Draft => new DraftStatus(),
            self::Done => new DoneStatus(),
        };
    }
}

$status = OrderStatus::from('draft')->createStatus();
print_r(json_encode(['rules' => $status->getRules()]));echo "\n\n";
# output: {"rules":["draft"]}
