<?php

return [
    'driver' => $_ENV['DB_CONNECTION'] ?? 'sqlite',
    'database' => $_ENV['DB_DATABASE'] ?? __DIR__ . '/../database/app.sqlite',
    'prefix' => '',
    'foreign_key_constraints' => true,
];
