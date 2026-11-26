<?php

declare(strict_types=1);

namespace App\Controllers;

final class AuthController extends AppController
{
    public function login(): void
    {
        $this->render('login', [
            'pageTitle' => 'Login',
            'activeTab' => 'sign-in',
            'formError' => null,
            'values' => $this->inputs(['login', 'password', 'remember-me']),
        ]);
    }

    public function register(): void
    {
        $formError = null;

        if ($this->isPost() && $this->input('password') !== $this->input('confirm-password')) {
            $formError = 'Passwords do not match.';
        }

        $this->render('login', [
            'pageTitle' => 'Register',
            'activeTab' => 'register',
            'formError' => $formError,
            'values' => $this->inputs(['login', 'email', 'password', 'confirm-password']),
        ]);
    }
}
