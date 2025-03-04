<?php

namespace App\Containers\Auth\Tasks;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateUserTask
{
    public function run($request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json(['message' => 'Користувач створений', 'user' => $user]);
    }
}
