<?php

namespace App\Services;

use App\Interfaces\IAuthService;
use App\Interfaces\IAuthRepository;

class AuthService implements IAuthService
{
    private $authRepository;

    public function __construct(IAuthRepository $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function getUserByEmail($email)
    {
        $user = $this->authRepository->getUserByEmail($email);
        return $user;
    }
}
