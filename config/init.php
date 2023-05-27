<?php

Dotenv\Dotenv::createImmutable($_SERVER['DOCUMENT_ROOT'])->load();

define("CONFIG", [
    "APP_NAME" => $_ENV['APP_NAME'],
    "APP_LOCATION" => $_ENV['APP_LOCATION'],
    "APP_DOMAIN" => $_ENV['APP_DOMAIN']
]);

define("DATABASE", [
    "DRIVER" => $_ENV["DB_CONNECTION"],
    "PORT" => $_ENV["DB_PORT"],
    "HOST" => $_ENV["DB_HOST"],
    "NAME" => $_ENV["DB_DATABASE"],
    "USER" => $_ENV["DB_USERNAME"],
    "PASS" => $_ENV["DB_PASSWORD"]
]);

function getConfig($config = null)
{
    return $config ? CONFIG[$config] : CONFIG['APP_NAME'];
}

function getDatabase($data = null)
{
    return $data ? DATABASE[$data] : DATABASE['NAME'];
}

function asset($file = '')
{
    if (file_exists(getConfig('APP_LOCATION') . '/public/' . $file)) {
        return getConfig('APP_DOMAIN') . '/public/' . $file;
    } else {
        return 'Não encontrado: ' . getConfig('APP_DOMAIN') . '/public/' . $file;
    }
}

function auth()
{
    return isset($_SESSION['user']) ? $_SESSION['user'] : 0;
}