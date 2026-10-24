<?php

use function App\svg_icon;

/*
 * @var ?string $content
 * @var ?string $pageTitle
 */
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= htmlspecialchars($pageTitle ?? 'Play it by Eye'); ?></title>

    <!-- FOUC script -->
    <script>
      (function () {
        try {
          const stored = localStorage.getItem("theme");
          const prefersDark = window.matchMedia("(prefers-color-scheme: dark)").matches;
          document.documentElement.setAttribute("data-theme", stored || (prefersDark ? "dark" : "light"));
        } catch (e) {}
      })();
    </script>

    <link rel="stylesheet" href="/css/main.css" />
  </head>
  <body>
    <header>
      <nav>
        <a href="/" class="navlink">
          <?= svg_icon('logo'); ?>
          Play it by Eye
        </a>
        <a href="/leaderboard" class="navlink">
          <?= svg_icon('manual'); ?>
          Leaderboard
        </a>
        <a href="/settings" class="navlink">
          <?= svg_icon('settings'); ?>
          Settings
        </a>
        <span class="grow"></span>
        <a href="/profile" class="navlink">
          <?= svg_icon('settings'); ?>
          Account
        </a>
      </nav>
    </header>

    <main><?= $content ?? ''; ?></main>
    <footer>footer</footer>
  </body>
</html>
