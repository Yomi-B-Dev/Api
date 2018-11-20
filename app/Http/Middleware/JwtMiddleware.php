<?php

namespace App\Http\Middleware;

use App\Http\Controllers\ApiResponseController;
use Closure;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\JWTAuth;

class JwtMiddleware
{
    protected $auth;

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function __construct(JWTAuth $auth)
    {
        $this->auth = $auth;
    }

    public function handle($request, Closure $next)
    {
        if (!$this->auth->parser()->setRequest($request)->hasToken())  //token not provided
        {
            return ApiResponseController::error('TOKEN_NOT_PROVIDED');
        }

        try {
            if (!$this->auth->parseToken()->authenticate()) {
                return ApiResponseController::error('USER_NOT_FOUND');
            }
        } catch (JWTException $e) {
            if ($e instanceof TokenExpiredException)
            {
                return ApiResponseController::error('TOKEN_EXPIRED');
            }
            else
            {
                return ApiResponseController::error('AUTH_ERROR');
            }
        }

        return $next($request);
    }
}
