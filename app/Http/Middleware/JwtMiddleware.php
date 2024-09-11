<?php

namespace App\Http\Middleware;

use App\Utils\RespondsWithHttpStatus;
use Closure;
use Exception;
use Illuminate\Http\Request;
use PHPOpenSourceSaver\JWTAuth\Exceptions\TokenExpiredException;
use PHPOpenSourceSaver\JWTAuth\Exceptions\TokenInvalidException;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;
use PHPOpenSourceSaver\JWTAuth\Http\Middleware\BaseMiddleware;
use Symfony\Component\HttpFoundation\Response;

class JwtMiddleware extends BaseMiddleware
{
    use RespondsWithHttpStatus;

    public function __construct()
    {
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch (Exception $e) {
            if ($e instanceof TokenInvalidException) {
                return $this->response(401, 'Peticion erronea', ['Token invalido'], []);
            } else if ($e instanceof TokenExpiredException) {
                return $this->response(401, 'Peticion erronea', ['Token expirado'], []);
            } else {
                return $this->response(401, 'Peticion erronea', ['Token no encontrado'], []);
            }
        }

        return $next($request);
    }
}
