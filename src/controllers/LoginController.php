<?php

declare(strict_types=1);

namespace App\Controller;

final class LoginController extends AppController
{
    public function index(): void
    {
        $this->render('login', [
            'pageTitle' => 'Login',
        ]);
    }
}
