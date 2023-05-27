<?php

namespace App\Blade;

use Jenssegers\Blade\Blade as LaravelBlade;

class Blade
{
    public static function render($template, $data = [])
    {
        echo static::returnTemplate($template, $data);
    }

    public static function returnTemplate($template, $data = [])
    {
        $blade = new LaravelBlade(
            getConfig('APP_LOCATION') . '/resources/views/',
            getConfig('APP_LOCATION') . '/storage/views/cache/'
        );

        $file = getConfig('APP_LOCATION') . '/resources/views/' . $template . '.blade.php';

        if (file_exists($file)) {
            return $blade->render($template, $data);
        } else {
            echo 'Erro';
        }
    }
}
