<?php

require_once __DIR__ . "./vendor/autoload.php";

use App\Database\Database;

new Database();

require_once __DIR__ . "./router/index.php";
