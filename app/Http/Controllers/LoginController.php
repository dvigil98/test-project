<?php

namespace App\Http\Controllers;

use App\Interfaces\IAuthService;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    private $authService;

    public function __construct(IAuthService $authService)
    {
        $this->authService = $authService;
    }

    public function login(Request $request)
    {
        if ($request->isMethod('post')) {

            $request->validate([
                'email' => 'required',
                'password' => 'required'
            ]);

            $credentials = $request->only('email', 'password');

            $user = $this->authService->getUserByEmail($credentials['email']);

            if (empty($user))
                return redirect('/login')->with('msgType', 'error')->with('msg', 'Usuario no existe');

            if (!$user->active)
                return redirect('/login')->with('msgType', 'error')->with('msg', 'Usuario desactivado');

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                return redirect("/dashboard");
            } else {
                return redirect('/login')->with('msgType', 'error')->with('msg', 'Credenciales invalidas');
            }
        }

        return view('login/login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
