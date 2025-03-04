<?php
namespace App\Containers\User\UI\WEB\Controllers;

use App\Http\Controllers\Controller;
use App\Containers\User\Models\User;
use App\Containers\User\Models\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        $users = User::with('roles')->get();
        return view('User::user.index', compact('users'));
    }

    public function edit(User $user) {
        $roles = Role::all();
        return view('User::user.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user) {
        $user->roles()->sync($request->roles);
        return redirect()->route('admin.users.index')->with('success', 'Ролі оновлено');
    }

    public function destroy(User $user) {
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'Користувач видалений');
    }
}
