<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();
        return view('backend.setting_management.roles_and_permission.permission.index', compact('permissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'permissions' => 'required|array',
            'permissions.*' => 'required|string|unique:permissions,name'
        ]);

        $savedPermissions = [];

        foreach ($request->permissions as $permissionName) {

            $permission = Permission::create([
                'name' => $permissionName,
                'guard_name' => 'web',
            ]);

            $savedPermissions[] = $permission->name;
        }

        return response()->json([
            'success' => true,
            'message' => 'Permissions created successfully.',
            'permissions' => $savedPermissions
        ]);
    }

    public function assignPermissionToRole(Request $request)
    {
        $request->validate([
            'role_id' => 'required|exists:roles,id',
            'permissions' => 'array',
        ]);

        $role = Role::findOrFail($request->role_id);
        $role->syncPermissions($request->permissions);

        return redirect()->back()->with('success', 'Permissions updated for the role.');
    }

    public function edit($id)
    {
        $permission = Permission::findOrFail($id);
        return view('backend.setting_management.roles_and_permission.permission.edit', compact('permission'));
    }

    public function update(Request $request, $id)
    {
        $permission = Permission::findOrFail($id);
        $request->validate([
            'name' => 'required|unique:permissions,name,' . $permission->id,
            'guard_name' => 'nullable|in:web,api',
        ]);

        $permission->update($request->only('name', 'guard_name'));
        return redirect()->route('permissions.index')->with('success', 'Permission updated successfully.');
    }

    public function destroy($id)
    {
        Permission::destroy($id);
        return back()->with('success', 'Permission deleted successfully.');
    }

    public function deleteSelected(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:permissions,id'
        ]);

        Permission::whereIn('id', $request->ids)->delete();

        return response()->json(['message' => 'Selected permission deleted successfully.']);
    }
}
