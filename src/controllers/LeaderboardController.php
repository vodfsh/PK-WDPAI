<?php

declare(strict_types=1);

namespace App\Controller;

final class LeaderboardController extends AppController
{
    public function index(): void
    {
        $this->render('leaderboard', [
            'pageTitle' => 'Leaderboard',
        ]);
    }
}
