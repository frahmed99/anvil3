<?php

namespace App\Http\Controllers\User;

use App\Models\Permissions;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;


class RolesController extends Controller
{

    public function index()
    {
        $roles = Role::all();
        return view('backend.pages.roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::all();
        $permission_groups = Permissions::getpermissionGroups();
        return view('backend.pages.roles.create', compact('permissions', 'permission_groups'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100|unique:roles'
        ], [
            'name.required' => 'Role Name Cannot Be Empty',
            'name.unique' => 'Role Already Exists',
        ]);
        $role = Role::create(['name' => $request->name]);
        $permissions = $request->input('permissions');
        if (!empty($permissions)) {
            $role->syncPermissions($permissions);
        }
        smilify('success', 'Role Added Successfully');
        return redirect()->route('role.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $role = Role::find($id);
        $permissions = Permission::all();
        $permission_groups = Permissions::getpermissionGroups();
        return view('backend.pages.roles.edit', compact('role', 'permissions', 'permission_groups'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:100|unique:roles,name,' . $id
        ], [
            'name.requried' => 'Please give a role name'
        ]);
        $role = Role::findById($id);
        $permissions = $request->input('permissions');
        if (!empty($permissions)) {
            $role->name = $request->name;
            $role->save();
            $role->syncPermissions($permissions);
        }
        smilify('success', 'Role Updated Successfully');

        return redirect()->route('role.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::find($id);
        $role->delete();

        smilify('success', 'Role Deleted!!');
        return redirect()->route('role.index');
    }
}
