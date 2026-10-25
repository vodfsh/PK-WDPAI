<?php

declare(strict_types=1);

require_once dirname(__DIR__).'/vendor/autoload.php';

require_once dirname(__DIR__).'/src/utils.php';

use App\Controllers\DefaultController;
use App\Controllers\LeaderboardController;
use App\Controllers\LoginController;
use App\Controllers\ProfileController;
use App\Controllers\SettingsController;
use App\Core\Routing;

$routing = new Routing();

$routing->get('/', DefaultController::class, 'index');
$routing->get('/leaderboard', LeaderboardController::class, 'index');
$routing->get('/settings', SettingsController::class, 'index');
$routing->get('/login', LoginController::class, 'index');
$routing->get('/profile', ProfileController::class, 'index');
$routing->get('/profile/{username}', ProfileController::class, 'show');

$routeFound = $routing->dispatch(
    $_SERVER['REQUEST_METHOD'],
    $_SERVER['REQUEST_URI'],
);

if (!$routeFound) {
    http_response_code(404);
    (new DefaultController())->notFound();
}
