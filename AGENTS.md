# AGENTS.md

A small **PHP 8.3 MVC app** ("Play it by Eye") served by **Nginx** in **Docker Compose**, with **PostgreSQL** and **vanilla JS web components**. No PHP framework, no JS bundler/build step.

## Read this first

- **Do not read** `vendor/`, `node_modules/`, `composer.lock`, `package-lock.json`, or `.php-cs-fixer.cache` — generated/third-party.
- Routes are registered in `public/index.php`. Start there for URL changes.
- App flow: `public/index.php` → `App\Core\Routing` → controller (`src/controllers/`) → `AppController::render()` → view + `src/views/layout.html.php`.
- **Views auto-load matching assets**: rendering `login` automatically includes `public/css/login.css` and `public/js/login.js` if they exist. You usually do **not** add `<link>`/`<script>` tags manually.
- DB schema lives in `docker/db/init/*.sql` (runs only on a fresh DB volume).

## Layout

```
public/index.php          front controller + route table
public/{css,js,assets}    static assets
src/core/Routing.php      tiny router ({param} and {id:\d+} patterns)
src/controllers/*.php     one controller per page; extend AppController
src/views/*.html.php      page templates (PHP short echo tags)
src/views/layout.html.php shared shell (nav, theme, asset injection)
src/utils.php             App\svg_icon() helper
docker/                   nginx, php, db images/config
```

## Commands

```bash
docker compose up --build -d          # app: http://localhost:8080
docker compose exec php composer install
docker compose --profile dev up       # browser-sync on :3000 (optional)

vendor/bin/php-cs-fixer fix --dry-run --diff   # PHP style (requires PSR-12-ish)
vendor/bin/phpstan analyze                     # level 6, src + public/index.php
npx prettier --check .                         # JS/CSS/JSON/Markdown
```

Run these before finishing PHP/JS/CSS changes — CI (`.github/workflows/ci.yml`) enforces them. There is **no test suite**.

## Conventions

- Every PHP file starts with `declare(strict_types=1);`.
- Namespaces are PSR-4: `App\Core\`, `App\Models\` (may not exist yet), `App\Controllers\`.
- Controllers are `final class XController extends AppController`. Actions are `public function name(): void`.
- Render with `$this->render('template', ['pageTitle' => '...', ...])`. Variables are extracted; `pageTitle` is suffixed with `- Play it by Eye`.
- Views use PHP alternative syntax and short echo: `<?= $var; ?>`, `<?php foreach (...): ?>`. Escape user output with `htmlspecialchars()`.
- Icons: `<?= svg_icon('name'); ?>` from `public/assets/icons/name.svg` (uses `currentColor`).
- CSS: use existing custom properties (`--background`, `--primary`, `--card-background`, etc.) from `public/css/main.css`; they switch automatically via `:root[data-theme="dark"]`. Reuse utility classes (`.card`, `.btn`, `.btn-ghost`, `.btn-primary`, `.sr-only`, `.grow`, `.flex`) before adding new rules.
- JS: ES modules, no framework. Interactive widgets are custom elements in `public/js/components/`, registered in `public/js/main.js`, and import `../../css/main.css` into their shadow root. Page scripts live in `public/js/<view>.js`.
- Use `.sr-only` for visually hidden headings; keep UI copy in English.
- Formatting: Prettier 2-space, 120 cols, double quotes (JS/CSS). `.html.php` files are formatted with the HTML parser; cast for Prettier where it helps but don't fight embedded PHP.

## Gotchas

- The router normalizes trailing slashes and casts digit-only params to `int`; controller method params receive them in order.
- `AppController::render()` relies on `$_SERVER['DOCUMENT_ROOT']` to detect asset files — this works under Nginx but not necessarily when calling controllers from CLI.
- Adding a page means: route in `public/index.php`, controller action, `src/views/<name>.html.php`, optionally `public/css/<name>.css` / `public/js/<name>.js`. Update nav links in `layout.html.php` manually.
