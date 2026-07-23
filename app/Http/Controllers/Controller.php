<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

abstract class Controller
{
    protected function response(
        ?string $message = null,
        array $data = [],
        int $status = 200
    ): JsonResponse {
        return response()->json([
            'status' => true,
            'message' => $message ?? 'Request handled successfully',
            'data' => $data,
        ], $status);
    }
}
