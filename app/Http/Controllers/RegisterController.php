<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        if ($request->isMethod('post')) {

            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required'
            ]);

            $user = new User();
            $user->role_id = 2;
            $user->name = $request->get('name');
            $user->email = $request->get('email');
            $user->password = Hash::make($request->get('password'));
            $user->active = 1;

            if ($user->save())
                return redirect('/login')->with('msgType', 'success')->with('msg', 'Datos guardados');
            else
                return redirect('/register')->with('msgType', 'success')->with('msg', 'Datos no guardados');
        }
        return view('register/register');
    }
}
