<?php

namespace App\Services\Role;

use \App\Services\Service;
use Illuminate\Http\RedirectResponse;
use Spatie\Permission\Models\Role;

class RoleService extends Service
{
    public function __construct()
    {
        parent::__construct();
    }

    public function storeRole(array $validated): RedirectResponse
    {
        $role = Role::create($validated);
        if($role){
            return redirect()->route('admin.roles.index')->with('message', 'Role created successfully')->with('role_id', $role->id);
        }

        return redirect()->back()->withErrors(['message'=> 'Something went wrong, please try again later']);
    }
}
