<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Organisation;
use App\Models\StructuralUnit;
use Illuminate\Http\Request;

class OrganisationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $organisations = Organisation::orderBy('name')->get();
        $title = "Organisations";

        return view('admin.organisations.index', compact('organisations', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Create Organisation";
        $organisations = Organisation::orderBy('name')->get();
        $structural_units = StructuralUnit::orderBy('name')->get();

        return view('admin.organisations.create', compact('organisations', 'title', 'structural_units'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:organisations|max:255',
            'structural_unit_id' => 'required|exists:structural_units,id|max:255',
            'parent_id' => 'nullable|max:255',
        ]);

        $organisation = Organisation::create($validatedData);
        return redirect()->route('admin.organisations.index')->with('success', 'Organisation created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
}
