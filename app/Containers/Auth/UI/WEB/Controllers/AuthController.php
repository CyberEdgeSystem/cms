<?php

namespace App\Containers\Auth\UI\WEB\Controllers;

use Illuminate\Http\Request;
use App\Containers\Auth\Actions\LoginAction;
use App\Containers\Auth\Actions\LogoutAction;
use App\Containers\Auth\Actions\RegisterAction;

class AuthController
{
    public function register(Request $request)
    {
        return app(RegisterAction::class)->run($request);
    }

    public function login(Request $request)
    {
        return app(LoginAction::class)->run($request);
    }

    public function logout(Request $request)
    {
        return app(LogoutAction::class)->run($request);
    }
}
