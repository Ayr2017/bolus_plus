<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Organisation;
use App\Models\User;
use App\Services\Employee\EmployeeService;
use Illuminate\Http\Request;
use JetBrains\PhpStorm\NoReturn;
use Spatie\Permission\Models\Permission;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(EmployeeService $employeeService )
    {
        $employees = Employee::all();
        return view('employees.index', [
            'employees'=>$employees,
            'title' => 'Employees',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::orderBy('name')->get();
        $organisations = Organisation::orderBy('name')->get();
        $title = "Add Employee";

        return view('employees.create', [
            'users' => $users,
            'title' => $title,
            'organisations' => $organisations,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'position' => 'required',
            'organisation_id' => 'required|exists:organisations,id',
            'user_id' => 'required|exists:users,id',
        ]);

        $employee = Employee::create($validatedData);
        return redirect()->route('employees.index')->with('success', 'Employee has been added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        return view('employees.show', [
            'employee'=>$employee,
            'title' => 'Employee',
            'users' => User::all(),
            'organisations' => Organisation::all(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        $users = User::all();
        $organisations = Organisation::all();
        $permissions = Permission
            ::orderByRaw('SUBSTRING_INDEX(SUBSTRING_INDEX(name, " ", 2), " ", -1)')
            ->get()
            ->chunk(3);
        return view('employees.edit',[
            'employee' => $employee,
            'title' => 'Edit employee',
            'users' => $users,
            'organisations' => $organisations,
            'permissions' => $permissions,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    #[NoReturn] public function update(Request $request, string $id): void
    {
        dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
