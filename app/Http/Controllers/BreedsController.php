<?php

namespace App\Http\Controllers;

use App\Http\Requests\Breed\DeleteBreedRequest;
use App\Http\Requests\Breed\EditBreedRequest;
use App\Http\Requests\Breed\StoreBreedRequest;
use App\Http\Requests\Breed\UpdateBreedRequest;
use App\Models\Breed;
use App\Services\Breed\BreedService;
use Illuminate\Http\RedirectResponse;
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
    public function store(StoreBreedRequest $request, BreedService $breedService): RedirectResponse
    {
        $breed = $breedService->storeBreed($request->validated());
        if($breed){
            return redirect()->route('breeds.index')
                ->with('message', 'Breed created.')
                ->with('breed_id', $breed->id)
                ->withInput();
        }
        return back()->withInput()->withErrors(['message' => 'Breed could not be created.']);

    }

    /**
     * Display the specified resource.
     */
    public function show(Breed $breed)
    {
        return view('breeds.show', [
            'breed' => $breed,
            'title' => 'Breed',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EditBreedRequest $request, Breed $breed)
    {
        return view('breeds.edit', [
            'breed' => $breed,
            'title' => 'Edit Breed',
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBreedRequest $request, Breed $breed, BreedService $breedService)
    {
        $breed = $breedService->updateBreed($request->validated(), $breed);
        if($breed){
            return redirect()->route('breeds.show', [
                'breed' => $breed
            ])->with('message', 'Breed updated.');
        }
        return back()->withInput()->withErrors(['message' => 'Breed update failed.']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeleteBreedRequest $request, Breed $breed, BreedService $breedService): RedirectResponse
    {
        $result = $breedService->deleteBreed($request->validated(), $breed);
        if($result){
            return redirect()->route('breeds.index')->with('message', 'Breed deleted.');
        }
        return back()->withInput();
    }
}
