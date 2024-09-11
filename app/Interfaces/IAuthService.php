<?php

namespace App\Interfaces;

interface IAuthService
{
    public function getUserByEmail($email);
}
