<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    public function resetPassword(Request $request)
    {
        if ($request->isMethod('post')) {

            $request->validate([
                'email' => 'required|email',
                'password' => 'required'
            ]);

            $user = User::where('email', $request->get('email'))->first();
            $user->password = Hash::make($request->get('password'));

            if ($user->save())
                return redirect('/login')->with('msgType', 'success')->with('msg', 'Datos guardados');
            else
                return redirect('/reset-password')->with('msgType', 'success')->with('msg', 'Datos no guardados');
        }
        return view('reset-password/reset-password');
    }
}
