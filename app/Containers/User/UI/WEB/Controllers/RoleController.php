<?php

namespace App\Containers\User\UI\WEB\Controllers;

use Illuminate\Http\Request;
use App\Containers\User\Models\Role;
use App\Containers\User\Models\Permission;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::with('permissions')->get();
        return view('User::role.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::all();
        return view('User::role.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|unique:roles']);
        $role = Role::create(['name' => $request->name]);
        $role->permissions()->sync($request->permissions);
        return redirect()->route('roles.index')->with('success', 'Роль створена');
    }

    public function edit(Role $role) {
        $permissions = Permission::all();
        return view('User::role.edit', compact('role', 'permissions'));
    }

    public function update(Request $request, Role $role) {
        $role->update(['name' => $request->name]);
        $role->permissions()->sync($request->permissions);
        return redirect()->route('admin.roles.index')->with('success', 'Роль оновлено');
    }

    public function destroy(Role $role) {
        $role->delete();
        return redirect()->route('admin.roles.index')->with('success', 'Роль видалено');
    }
}
