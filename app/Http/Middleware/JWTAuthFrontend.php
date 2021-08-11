<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

class JWTAuthFrontend
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        try {
            $user = \Tymon\JWTAuth\Facades\JWTAuth::parseToken()->authenticate();
        } catch (\Exception $exception) {
            if ($exception instanceof TokenExpiredException) {
                return response()->json([
                    'message' => 'Token Expired'
                ], 401);
            } else if ($exception instanceof TokenInvalidException) {
                return response()->json([
                    'message' => 'Token Invalid'
                ], 403);
            } else {
                return response()->json([
                    'message' => $exception->getMessage()
                ], 403);
            }
        }
        return $next($request);
    }
}
