<?php

namespace App\Controllers;

use App\Blade\Blade;
use App\Models\Response;

abstract class Controller extends Response
{
    public $router;
    public $blade;
    
    public function __construct($router) {
        $this->router = $router;
        $this->blade = new Blade();
        $this->blade->blade->share([ 'router' => $router ]);
    }

    public function encrypt_string($string)
    {
        return password_hash($string, PASSWORD_BCRYPT);
    }

    public function verify_session()
    {
        return isset($_SESSION['user']);
    }

    public function json_response($param, $data)
    {
    	echo json_encode([$param => $data]);
    }

    public function format_username($username)
    {
        $first_name = explode(' ', $username)[0];
        $last_name = strrchr($username, ' ');

        $string = $first_name . $last_name;
        $string = str_replace(' ', '', $string);

        return
            strtolower(
                preg_replace(
                    array(
                        "/(á|à|ã|â|ä)/",
                        "/(Á|À|Ã|Â|Ä)/",
                        "/(é|è|ê|ë)/",
                        "/(É|È|Ê|Ë)/",
                        "/(í|ì|î|ï)/",
                        "/(Í|Ì|Î|Ï)/",
                        "/(ó|ò|õ|ô|ö)/",
                        "/(Ó|Ò|Õ|Ô|Ö)/",
                        "/(ú|ù|û|ü)/",
                        "/(Ú|Ù|Û|Ü)/",
                        "/(ñ)/", "/(Ñ)/",
                        "/(ç)/", "/(Ç)/"
                    ),
                    explode(" ", "a A e E i I o O u U n N c C"),
                    $string
                )
            );
    }

    public function slug($string)
    {
        $string = str_replace(' ', '-', $string);

        return
            strtolower(
                preg_replace(
                    array(
                        "/(á|à|ã|â|ä)/",
                        "/(Á|À|Ã|Â|Ä)/",
                        "/(é|è|ê|ë)/",
                        "/(É|È|Ê|Ë)/",
                        "/(í|ì|î|ï)/",
                        "/(Í|Ì|Î|Ï)/",
                        "/(ó|ò|õ|ô|ö)/",
                        "/(Ó|Ò|Õ|Ô|Ö)/",
                        "/(ú|ù|û|ü)/",
                        "/(Ú|Ù|Û|Ü)/",
                        "/(ñ)/", "/(Ñ)/",
                        "/(ç)/", "/(Ç)/"
                    ),
                    explode(" ", "a A e E i I o O u U n N c C"),
                    $string
                )
            );
    }
}
