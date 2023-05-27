<?php

function session($index) {
    $session = isset($_SESSION[$index]) ? $_SESSION[$index] : [];
    unset($_SESSION[$index]);
    return $session;
}

function flask($key, $value)
{
    $_SESSION[$key] = $value;
}