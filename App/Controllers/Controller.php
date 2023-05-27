<?php

namespace App\Controllers;

use App\Blade\Blade;

class Controller
{
    public $blade;

    public function __construct() {
        $this->blade = new Blade();
    }
}
