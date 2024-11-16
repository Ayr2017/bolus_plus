<?php

namespace App\Http\Controllers\Api\V1;

use App\Helpers\ErrorLog;
use App\Http\Controllers\Controller;
use App\Http\Requests\Breed\IndexBreedRequest;
use App\Http\Resources\Breed\BreedResource;
use App\Http\Responses\ApiResponse;
use App\Services\Breed\BreedService;
use Illuminate\Http\Request;

class BreedsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(IndexBreedRequest $request, BreedService $breedService)
    {
        try {
            $breeds = $breedService->getBreeds($request->validated());
            return ApiResponse::success(BreedResource::paginatedCollection($breeds));
        }catch (\Throwable $throwable){
            ErrorLog::write(__METHOD__,__LINE__,$throwable->getMessage());
        }

        return ApiResponse::error('Something went wrong!');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
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
