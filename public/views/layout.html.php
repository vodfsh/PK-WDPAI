<?php
/**
 * @var ?string  $content
 * @var ?string  $pageTitle
 * @var string[] $extraCss
 */

use function App\svg_icon;

$currentPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?: '/';
$currentPath = ('/' !== $currentPath) ? rtrim($currentPath, '/') : '/';

/**
 * Helper to return 'active' class if the link matches the current route.
 */
$isActive = static function (string $path) use ($currentPath): string {
    // Normalize target path too
    $normalizedPath = ('/' !== $path) ? rtrim($path, '/') : '/';

    return $currentPath === $normalizedPath ? 'active' : '';
};
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

    <?php foreach ($extraCss as $cssFile) { ?>
    <link rel="stylesheet" href="<?= htmlspecialchars($cssFile, ENT_QUOTES, 'UTF-8'); ?>" />
    <?php } ?>
  </head>
  <body>
    <header>
      <nav>
        <div class="nav-left">
          <a href="/" class="btn-ghost <?= $isActive('/'); ?>">
            <?= svg_icon('logo'); ?>
            Play it by Eye
          </a>
          <a href="/leaderboard" class="btn-ghost <?= $isActive('/leaderboard'); ?>">
            <?= svg_icon('manual'); ?>
            Leaderboard
          </a>
        </div>
        <div class="nav-right">
          <button onclick="toggleTheme()" href="/settings" class="btn-ghost">
            <?= svg_icon('moon', 'light-only'); ?>
            <?= svg_icon('sun', 'dark-only'); ?>
          </button>
          <a href="/settings" class="btn-ghost">
            <?= svg_icon('settings'); ?>
          </a>
          <a href="/profile" class="btn-ghost">
            <?= svg_icon('user'); ?>
          </a>
        </div>
      </nav>
    </header>

    <main><?= $content ?? ''; ?></main>
    <footer>footer</footer>
  </body>
</html>
