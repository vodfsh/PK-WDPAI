<?php

declare(strict_types=1);

namespace App;

function svg_icon(string $name, string $class = ''): string
{
    $filePath = dirname(__DIR__, 1)."/public/assets/icons/{$name}.svg";

    if (!file_exists($filePath)) {
        throw new \RuntimeException('Icon not found: '.$name);
    }

    $svg = file_get_contents($filePath);

    if (!empty($class)) {
        $svg = preg_replace('/<svg\b/', '<svg class="'.htmlspecialchars($class, ENT_QUOTES).'"', $svg, 1);
    }

    return $svg;
}
