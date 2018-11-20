<?php

namespace App\Http\Controllers;

class ApiResponseController extends Controller
{
    public static function error($val = 'GENERAL_ERROR')
    {
        return self::jsonResponse('error', $val);
    }

    public static function success($val)
    {
        return self::jsonResponse('data', $val);
    }

    private static function jsonResponse($key, $value)
    {
        return response()->json([$key => $value]);
    }
}
