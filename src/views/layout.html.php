<?php
/**
 * @var ?string  $content
 * @var ?string  $pageTitle
 * @var string[] $extraCss
 * @var string[] $extraJs
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
    <script src="js/theme.js"></script>

    <link rel="stylesheet" href="/css/main.css?v=<?= @filemtime($_SERVER['DOCUMENT_ROOT'].'/css/main.css'); ?>" />

    <!-- CSS -->
    <?php foreach ($extraCss as $file) { ?>
    <link
      rel="stylesheet"
      href="<?= htmlspecialchars($file, ENT_QUOTES, 'UTF-8'); ?>?v=<?= @filemtime($_SERVER['DOCUMENT_ROOT'].$file); ?>"
    />
    <?php } ?>

    <!-- JS -->
    <?php foreach ($extraJs as $file) { ?>
    <script src="<?= htmlspecialchars($file, ENT_QUOTES, 'UTF-8'); ?>?v=<?= @filemtime($_SERVER['DOCUMENT_ROOT'].$file); ?>"></script>
    <?php } ?>

    <script
      type="module"
      src="/js/main.js?v=<?= @filemtime($_SERVER['DOCUMENT_ROOT'].'/js/main.js'); ?>"
      blocking="render"
    ></script>

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:ital,wght@0,100..800;1,100..800&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <header>
      <nav>
        <div class="nav-left">
          <a href="/" class="btn-ghost <?= $isActive('/'); ?>"> <?= svg_icon('logo'); ?> Play it by Eye </a>
          <a href="/leaderboard" class="btn-ghost <?= $isActive('/leaderboard'); ?>">
            <?= svg_icon('manual'); ?> Leaderboard
          </a>
        </div>
        <div class="nav-right">
          <my-toggle id="theme-toggle" variant="ghost">
            <?= svg_icon('moon', 'light-only'); ?> <?= svg_icon('sun', 'dark-only'); ?>
          </my-toggle>
          <a href="/settings" class="btn-ghost"> <?= svg_icon('settings'); ?> </a>
          <a href="/profile" class="btn-ghost"> <?= svg_icon('user'); ?> </a>
        </div>
      </nav>
    </header>

    <main><?= $content ?? ''; ?></main>
    <footer>footer</footer>
  </body>
</html>
