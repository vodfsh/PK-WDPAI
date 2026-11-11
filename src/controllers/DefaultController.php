<?php

declare(strict_types=1);

namespace App\Controllers;

final class DefaultController extends AppController
{
    public function index(): void
    {
        $this->render('home', [
            'pageTitle' => '',
        ]);
    }

    public function notFound(): void
    {
        $this->render('not-found', [
            'pageTitle' => 'Page not found',
        ]);
    }
}
