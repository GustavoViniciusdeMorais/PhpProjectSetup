<?php

namespace Gustavomorais\Geobash;

use RuntimeException;

class TemplateRenderer
{
    private string $templatePath;

    public function __construct(?string $templatePath = null)
    {
        $this->templatePath = $templatePath ?? dirname(__DIR__) . '/templates';
    }

    public function render(string $template, array $data = []): string
    {
        return $this->renderFile("{$this->templatePath}/{$template}.php", $data);
    }

    private function renderFile(string $file, array $data): string
    {
        if (!is_file($file)) {
            throw new RuntimeException("Template não encontrado: {$file}");
        }

        ob_start();
        extract($data);
        require $file;

        return (string) ob_get_clean();
    }
}
