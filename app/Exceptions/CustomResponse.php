<?php
/**
 * Created by PhpStorm.
 * User: CompieCourse
 * Date: 11/15/18
 * Time: 11:12 AM
 */

namespace App\Exceptions;

use Illuminate\Support\Facades\Response;

class CustomResponse extends Response
{
    public static function response($value = 'GENERAL_ERROR', $key = 'error')
    {
        return [$key => $value];
    }
}