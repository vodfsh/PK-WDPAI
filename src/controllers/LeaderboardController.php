<?php

declare(strict_types=1);

namespace App\Controllers;

final class LeaderboardController extends AppController
{
    public function index(): void
    {
        $this->render('leaderboard', [
            'pageTitle' => 'Leaderboard',
        ]);
    }
}
