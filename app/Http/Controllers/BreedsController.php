<?php

namespace App\Http\Controllers;

use App\Http\Requests\Breed\StoreBreedRequest;
use App\Models\Breed;
use Illuminate\Http\Request;

class BreedsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $breeds = Breed::orderBy('created_at', 'desc')->get();
        return view('breeds.index', [
            'breeds' => $breeds,
            'title' => 'Breeds',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('breeds.create', [
            'title' => 'Create Breed',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBreedRequest $request)
    {
        $breed = Breed::create($request->validated());
        session()->flashInput($request->input());

        return redirect()->route('breeds.index')
            ->with('message', 'Breed created.')
            ->with('breed_id', $breed->id);
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
