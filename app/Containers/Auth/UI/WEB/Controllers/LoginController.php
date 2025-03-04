<?php

namespace App\Containers\Auth\UI\WEB\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    // Відображення форми логіну
    public function show()
    {
        return view('Auth::login.show');
    }

    // Обробка логіну
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard')->with('success', 'Ви успішно увійшли!');
        }

        return back()->withErrors(['email' => 'Невірні облікові дані']);
    }

    // Вихід
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Ви вийшли з системи.');
    }
}

