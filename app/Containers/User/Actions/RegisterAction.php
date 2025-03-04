<?php

namespace App\Containers\Auth\Actions;

use Illuminate\Http\Request;
use App\Containers\Auth\Tasks\CreateUserTask;

class RegisterAction
{
    public function run(Request $request)
    {
        return app(CreateUserTask::class)->run($request);
    }
}
