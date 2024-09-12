<?php

namespace App\Http\Controllers;

use App\Http\Requests\Role\StoreRoleRequest;
use App\Services\Role\RoleService;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    public function index()
    {
        $roles = Role::orderBy('name', 'asc')->get();
        return view('roles.index',[
            'roles' => $roles,
            'title' => 'Roles'
        ]);
    }

    public function create()
    {

    }

    public function store(StoreRoleRequest $request, RoleService $roleService)
    {
        session()->flashInput($request->input());
        return $roleService->storeRole($request->validated());
    }

    public function show(Role $role)
    {
        return view('roles.show',[
            'title' => 'Role',
            'role' => $role,
        ]);
    }

    public function edit(Role $role)
    {

    }

    public function update(Request $request, Role $role)
    {

    }

    public function destroy(Role $role)
    {

    }
}
