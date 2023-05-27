<?php

namespace App\Models;

use \Illuminate\Database\Eloquent\Model;

class Response
{
    public $title;

    public $message;

    public $success;

    public $type;

    public $data;

    public function returnResponse()
    {
        $response = array(
            'title' => $this->title,
            'message' => $this->message,
            'success' => $this->success,
            'type' => $this->type,
            'data' => $this->data
        );

        return $response;
    }

    public function warningResponse()
    {
        $response = array(
            'title' => "Aviso!",
            'message' => $this->message,
            'success' => false,
            'type' => "warning",
            'data' => $this->data
        );

        return $response;
    }

    public function errorResponse()
    {
        $response = array(
            'title' => "Erro!",
            'message' => $this->message,
            'success' => false,
            'type' => "danger",
            'data' => $this->data
        );

        return $response;
    }

    public function successResponse()
    {
        $response = array(
            'title' => "Sucesso!",
            'message' => $this->message,
            'success' => true,
            'type' => "success",
            'data' => $this->data
        );

        return $response;
    }
}
