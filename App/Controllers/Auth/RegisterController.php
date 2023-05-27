<?php

namespace App\Controllers\Auth;

use App\Models\User;
use App\Controllers\Controller;

class RegisterController extends Controller
{
    public function register($data)
    {
        $user = new User();
        $user->name = $data['name'];
        $user->username = $this->format_username($data['name']);
        $user->email = $data['email'];
        $user->password = $this->encrypt_string($data['password']);

        if ($user->save()) {
            $this->router->redirect("/");
        }
    }
}