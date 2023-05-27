<?php

namespace App\Blade;

use Jenssegers\Blade\Blade as LaravelBlade;

class Blade
{
    public $blade;

    public function __construct() {
        $this->blade = new LaravelBlade(
            getConfig('APP_LOCATION') . '/resources/views/',
            getConfig('APP_LOCATION') . '/storage/views/cache/'
        );
    }

    public function render($template, $data = [])
    {
        echo $this->returnTemplate($template, $data);
    }

    public function returnTemplate($template, $data = [])
    {
        $file = getConfig('APP_LOCATION') . '/resources/views/' . $template . '.blade.php';

        if (file_exists($file)) {
            return $this->blade->render($template, $data);
        } else {
            echo 'Desculpa, mas o componente blade <b>' . $file . '</b> não pode ser encontrado';
        }
    }
}
