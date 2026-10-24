<?php

declare(strict_types=1);

namespace App\Controller;

abstract class AppController
{
    /**
     * @param array<string,mixed> $variables
     */
    protected function render(string $template, array $variables = []): void
    {
        $viewPath = dirname(__DIR__, 2).'/public/views/'.$template.'.html.php';
        $layoutPath = dirname(__DIR__, 2).'/public/views/layout.html.php';

        if (!is_file($viewPath)) {
            throw new \RuntimeException('View not found: '.$template);
        }

        extract($variables, EXTR_SKIP);

        ob_start(); // capture the view

        require $viewPath;
        $content = ob_get_clean();

        if (file_exists($layoutPath)) {
            require $layoutPath;
        } else {
            // fallback if layout doesn't exist
            echo $content;
        }
    }
}
