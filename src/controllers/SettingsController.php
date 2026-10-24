<?php

declare(strict_types=1);

namespace App\Controller;

final class SettingsController extends AppController
{
    public function index(): void
    {
        $this->render('settings', [
            'pageTitle' => 'Settings',
        ]);
    }
}
