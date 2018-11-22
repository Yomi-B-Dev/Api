<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Response;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\JWTAuth;

class JwtMiddleware
{
    protected $auth;

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function __construct(JWTAuth $auth)
    {
        $this->auth = $auth;
    }

    public function handle($request, Closure $next)
    {
        if (!$this->auth->parser()->setRequest($request)->hasToken()) {

            return Response::json(['error', 'TOKEN_NOT_PROVIDED']);

        }

        try {
            if (!$this->auth->parseToken()->authenticate()) {

                return Response::json(['error', 'USER_NOT_FOUND']);

            }

        } catch (JWTException $e) {
            if ($e instanceof TokenExpiredException) {

                return Response::json(['error', 'TOKEN_EXPIRED']);

            } else {

                return Response::json(['error', 'AUTH_ERROR']);

            }
        }

        return $next($request);
    }
}
