<?php

namespace App\Containers\Auth\Tasks;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticateUserTask
{
    public function run(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return response()->json(['message' => 'Вхід успішний']);
        }

        return views('Auth::auth.login');
    }
}
