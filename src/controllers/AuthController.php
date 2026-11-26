<?php

declare(strict_types=1);

namespace App\Controllers;

final class AuthController extends AppController
{
    public function login(): void
    {
        if ($this->isPost()) {
            $login = $_POST['login'] ?? '';
            $password = $_POST['password'] ?? '';
            $remember_me = ($_POST['remember-me'] ?? '') == 'on';
            var_dump($login, $password, $remember_me);
        }

        $this->render('login', [
            'pageTitle' => 'Login',
        ]);
    }

    public function register(): void
    {
        if ($this->isPost()) {
            $login = $_POST['login'] ?? '';
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            $confirm_password = $_POST['confirm-password'] ?? '';
            var_dump($login, $email, $password, $confirm_password);
        }

        $this->render('login', [
            'pageTitle' => 'Login',
        ]);
    }
}
