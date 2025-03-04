<?php

namespace App\Containers\Auth\UI\WEB\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\User;

class RegisterController extends Controller
{
    // Відображення форми реєстрації
    public function showForm()
    {
        return view('Auth::register.showForm');
    }

    // Обробка реєстрації
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user); // Автоматично авторизуємо користувача після реєстрації

        return redirect()->route('dashboard')->with('success', 'Реєстрація успішна!');
    }
}
