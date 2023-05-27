<?php

namespace App\Controllers\Auth;

use App\Models\User;
use App\Controllers\Controller;

class LoginController extends Controller
{
    public function login($data)
    {
        $user = User::whereUsername($data['username'])->first() ?? User::whereEmail($data['username'])->first();

        if ($user) {
            if (password_verify($data['password'], $user->password)) {
                $_SESSION['user'] = $user->id;
                $this->router->redirect("home");
            }
        } else {
            $this->router->redirect("login");
        }
    }

    public function logout()
    {
        unset($_SESSION['user']);
        $this->router->redirect('login');
    }
}