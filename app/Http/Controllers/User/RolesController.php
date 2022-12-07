<?php

namespace App\Http\Controllers\User;

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
        return view('backend.pages.roles.create', compact('permissions'));
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
        return back();
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $tax = Role::find($id);
        $tax->delete();

        return redirect()->route('role.index');
    }
}
