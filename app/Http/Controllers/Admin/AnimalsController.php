<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Animal;
use App\Models\Organisation;
use Illuminate\Http\Request;

class AnimalsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $animals = Animal::all();
        $title = "Animals";
        return view('admin.animals.index', compact('animals', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Add Animal";
        $organisations = Organisation::orderBy('name')->get();
        return view('admin.animals.create',[
            'title' => $title,
            'organisations' => $organisations
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'organisation_id' => 'required',
            'number' => 'required',
        ]);

        $animal = Animal::create($validatedData);
        return redirect()->route('admin.animals.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Animal $animal)
    {
        return view('admin.animals.show', [
            'animal' => $animal,
            'title' => "Animals"
        ]);
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
