<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Role\StoreRoleRequest;
use App\Services\Role\RoleService;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    public function index()
    {
        $roles = Role::orderBy('name', 'asc')->get();
        return view('admin.roles.index',[
            'roles' => $roles,
            'title' => 'Roles'
        ]);
    }

    public function create()
    {

    }

    public function store(StoreRoleRequest $request, RoleService $roleService)
    {
        return $roleService->storeRole($request->validated());
    }

    public function show(Role $role)
    {

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
