<?php

namespace App\Http\Controllers\ApiResponse;

use App\Http\Controllers\Controller;


class ApiResponseController extends Controller
{
    protected function error($val = 'GENERAL_ERROR')
    {
        return $this->jsonResponse('error', $val);
    }

    protected function success($val)
    {
        return $this->jsonResponse('data', $val);
    }

    private function jsonResponse($key, $value)
    {
        return response()->json([$key => $value]);
    }
}
