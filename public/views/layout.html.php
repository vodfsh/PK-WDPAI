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

      function toggleTheme() {
        const currentTheme = document.documentElement.getAttribute("data-theme");
        const newTheme = currentTheme === "dark" ? "light" : "dark";

        document.documentElement.setAttribute("data-theme", newTheme);
        localStorage.setItem("theme", newTheme);
      }
    </script>

    <link rel="stylesheet" href="/css/main.css" />
  </head>
  <body>
    <header>
      <nav>
        <div class="nav-left">
          <a href="/" class="navlink">
            <?= svg_icon('logo'); ?>
            Play it by Eye
          </a>
          <a href="/leaderboard" class="navlink">
            <?= svg_icon('manual'); ?>
            Leaderboard
          </a>
        </div>
        <div class="nav-right">
          <button onclick="toggleTheme()" href="/settings" class="navlink btn-ghost">
            <?= svg_icon('moon', 'light-only'); ?>
            <?= svg_icon('sun', 'dark-only'); ?>
          </button>
          <a href="/settings" class="navlink">
            <?= svg_icon('settings'); ?>
          </a>
          <a href="/profile" class="navlink">
            <?= svg_icon('user'); ?>
          </a>
        </div>
      </nav>
    </header>

    <main><?= $content ?? ''; ?></main>
    <footer>footer</footer>
  </body>
</html>
