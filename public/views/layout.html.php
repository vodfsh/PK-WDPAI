<?php
/**
 * @var ?string $content
 * @var ?string $pageTitle
 */
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo htmlspecialchars($pageTitle ?? 'Play it by Eye'); ?></title>

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
      <nav>TODO</nav>
    </header>

    <main><?php echo $content ?? ''; ?></main>
  </body>
</html>
