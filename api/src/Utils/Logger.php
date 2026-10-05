<?php

namespace Gustavomorais\Geobash\Utils;

class Logger
{
    private string $logFile;

    public function __construct(string $logFile = __DIR__ . '/../../logs/app.logs')
    {
        $this->logFile = $logFile;
    }

    public function write(string $title, array $data): void
    {
        $entry = "[{$title}] - " . json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . PHP_EOL;

        file_put_contents($this->logFile, $entry, FILE_APPEND | LOCK_EX);
    }
}
