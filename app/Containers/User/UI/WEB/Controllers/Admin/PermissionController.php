<?php
namespace App\Containers\User\UI\WEB\Controllers\Admin;

use App\Containers\User\Models\Permission;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index() {
        $permissions = Permission::all();
        return view('User::admin.permissions.index', compact('permissions'));
    }

    public function create() {
        return view('User::admin.permissions.create');
    }

    public function store(Request $request) {
        $request->validate(['name' => 'required|unique:permissions']);
        Permission::create(['name' => $request->name]);
        return redirect()->route('admin.permissions.index')->with('success', 'Дозвіл створено');
    }

    public function edit(Permission $permission) {
        return view('User::admin.permissions.edit', compact('permission'));
    }

    public function update(Request $request, Permission $permission) {
        $request->validate(['name' => 'required|unique:permissions,name,' . $permission->id]);
        $permission->update(['name' => $request->name]);
        return redirect()->route('admin.permissions.index')->with('success', 'Дозвіл оновлено');
    }

    public function destroy(Permission $permission) {
        $permission->delete();
        return redirect()->route('admin.permissions.index')->with('success', 'Дозвіл видалено');
    }
}
