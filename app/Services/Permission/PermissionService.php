<?php

namespace App\Services\Permission;

use \App\Services\Service;
use Illuminate\Http\RedirectResponse;
use Spatie\Permission\Models\Permission;
use Symfony\Component\HttpFoundation\Response;

class PermissionService extends Service
{
    public function __construct()
    {
        parent::__construct();
    }

    public function storePermission(array $data): RedirectResponse
    {
        $permission =  Permission::create($data);
        if($permission){
            return redirect()->back(Response::HTTP_CREATED)->with('message', 'Permission created successfully');
        }

        return redirect()->back()->withErrors(['message'=> 'Something went wrong']);
    }

    public function deletePermission(array $validated): RedirectResponse
    {
        $result = Permission::destroy($validated['id']);
        if($result){
            return redirect()->back()->with('message', 'Permission deleted successfully')->setStatusCode(Response::HTTP_ACCEPTED);
        }

        return redirect()->back()->withErrors(['message'=> 'Something went wrong']);
    }
}
