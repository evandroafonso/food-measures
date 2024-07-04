<?php

namespace App\Exceptions;

use Exception;

class CustomException extends Exception
{
    protected $message;

    public function __construct($message = "Ocorreu um erro.")
    {
        $this->message = $message;
        parent::__construct($this->message);
    }

    public function render($request)
    {
        return response()->json([
            'status' => false,
            'message' => $this->getMessage()
        ], 400);
    }
}
