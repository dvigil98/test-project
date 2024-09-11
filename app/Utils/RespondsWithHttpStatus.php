<?php

namespace App\Utils;

trait RespondsWithHttpStatus
{
    public function response($code = 200, $message = '', $errors = [], $data = [])
    {
        return response()->json([
            'code' => $code,
            'message' => $message,
            'errors' => $errors,
            'data' => $data
        ], $code);
    }
}
