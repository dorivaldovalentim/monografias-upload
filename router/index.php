<?php

use CoffeeCode\Router\Router;

$router = new Router(getConfig('APP_DOMAIN'));

/** Definindo o namespace geral do app */

$router->namespace("App\Controllers");


/** Definindo as rotas do front-site */
$router->group(null);
$router->get("/", "Web:home");
$router->get("/home", "WebController:home", 'home');

/** Auth */
$router->group(null);
$router->namespace("App\Controllers\Auth");
$router->post("/login", "LoginController:login", 'login');
$router->post("/register", "RegisterController:register", 'register');
$router->get("/logout", "LoginController:logout", 'logout');

/** Definindo as rotas de erro */
$router->group("error");
$router->get("/error/{error_code}", function($data) { echo $data['error_code']; });

$router->dispatch();

if ($router->error()) {
    $router->redirect("/error/{$router->error()}");
}