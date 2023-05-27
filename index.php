<?php

require_once __DIR__ . "./vendor/autoload.php";

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

session_start();

use App\Database\Database;

new Database();

require_once __DIR__ . "./router/index.php";
