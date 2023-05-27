<?php

namespace App\Controllers\Auth;

use App\Models\User;
use App\Controllers\Controller;

class RegisterController extends Controller
{
    function __construct($router) {
        parent::__construct($router);

        if (! $this->verify_session() || user()->is_admin != 0 && user()->is_admin != 1) {
            $this->router->redirect('home');
        }
    }

    public function register($data)
    {
        if (in_array('', $data)) {
            $this->message = "Você precisa preencher todos os campos";
            flask('response', $this->warningResponse());
            $this->router->redirect('register');
        }

        $users = User::where('name', '=', $data['name'])->orWhere('email', '=', $data['email'])->get();

        if ($users->count() > 0) {
            $this->message = "Este usuário já existe";
            flask('response', $this->warningResponse());
            $this->router->redirect('register');
        }

        $user = new User();
        $user->name = $data['name'];
        $user->username = $this->format_username($data['name']);
        $user->email = $data['email'];
        $user->image = $data['image'];
        $user->is_admin = $data['is_admin'];
        $user->password = $this->encrypt_string('1234');

        if ($user->save()) {
            $this->message = "Usuário cadastrado";
            flask('response', $this->successResponse());
            $this->router->redirect("register");
        }
    }
}