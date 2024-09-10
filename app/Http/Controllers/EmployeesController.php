<?php

namespace App\Http\Controllers;

use App\Http\Requests\Employee\EditEmployeeRequest;
use App\Http\Requests\Employee\UpdateEmployeePermissionsRequest;
use App\Models\Employee;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('employees.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return redirect()->route('employees.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        return view('employees.show',[
            'title' => 'Employee '.$employee->id,
            'employee' => $employee,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee  $employee, EditEmployeeRequest $request)
    {
        $permissions = Permission
            ::orderByRaw('SUBSTRING_INDEX(SUBSTRING_INDEX(name, " ", 2), " ", -1)')
            ->get();

        return view('employees.edit',[
            'employee' => $employee,
            'title' => 'Edit employee',
            'permissions' => $permissions,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function updatePermissions(UpdateEmployeePermissionsRequest $request, Employee $employee)
    {
        $result = $employee->syncPermissions($request->validated());
        if($result){
            return redirect()->back()->with('message', 'Permissions updated.');
        }

        return redirect()->back()->withErrors(['message'=> 'Permissions not updated.']);
    }
}
