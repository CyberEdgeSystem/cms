<?php

namespace App\Containers\Auth\Actions;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutAction
{
    public function run(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        return response()->json(['message' => 'Вихід виконано']);
    }
}
