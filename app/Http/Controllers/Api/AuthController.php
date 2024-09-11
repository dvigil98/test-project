<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Utils\RespondsWithHttpStatus;
use App\Interfaces\IAuthService;
use App\Http\Requests\AuthRequest;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    use RespondsWithHttpStatus;

    private $authService;

    public function __construct(IAuthService $authService)
    {
        $this->authService = $authService;
    }

    public function login(AuthRequest $request)
    {
        $credentials = $request->only('email', 'password');

        $user = $this->authService->getUserByEmail($credentials['email']);

        if (empty($user))
            return $this->response(code: 401, message: 'Usuario no existe');

        if (!$user->active)
            return $this->response(code: 401, message: 'Usuario desactivado');

        $token = JWTAuth::attempt($credentials);

        if (!$token) {
            return $this->response(code: 401, message: 'Credenciales invalidas');
        }


        return $this->response(
            code: 200,
            message: 'Sesion iniciada correctamente',
            data: [
                'user' => $user,
                'access_token' => $token,
                'token_type' => 'Bearer'
            ]
        );
    }

    public function logout()
    {
        JWTAuth::parseToken()->invalidate(true);
        return $this->response(code: 200, message: 'Sesion finalizada');
    }
}
