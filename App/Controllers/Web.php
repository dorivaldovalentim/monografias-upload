<?php

namespace App\Controllers;

use App\Models\User;

class Web extends Controller
{
    public function home()
    {
        $user = (new User())->find(1);
        $this->blade->render('home', compact('user'));
    }
}
