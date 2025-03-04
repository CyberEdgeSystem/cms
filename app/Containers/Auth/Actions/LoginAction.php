<?php

namespace App\Containers\Auth\Actions;

use Illuminate\Http\Request;
use App\Containers\Auth\Tasks\AuthenticateUserTask;

class LoginAction
{
    public function run(Request $request)
    {
        return app(AuthenticateUserTask::class)->run($request);
    }
}
