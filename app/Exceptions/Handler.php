<?php

namespace App\Exceptions;

use Illuminate\Support\Facades\Log;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        Log::info('Unauthenticated method called.');
        return response()->json([
            'message' => 'Error: Token expired, try login again!',
        ], 401);
    }
}
