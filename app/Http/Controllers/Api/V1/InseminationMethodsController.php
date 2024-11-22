<?php

namespace App\Http\Controllers\Api\V1;

use App\Helpers\ErrorLog;
use App\Http\Controllers\Controller;
use App\Http\Requests\InseminationMethod\IndexInseminationMethodRequest;
use App\Http\Resources\Breed\BreedResource;
use App\Http\Responses\ApiResponse;
use App\Services\InseminationMethods\InseminationMethodService;
use Illuminate\Http\Request;

class InseminationMethodsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(IndexInseminationMethodRequest $request, InseminationMethodService $service)
    {
        try {
            $im =  $service->getInseminationMethods();
            return ApiResponse::success(['items'=>$im]);
        }catch (\Throwable $throwable){
            ErrorLog::write(__METHOD__,__LINE__, $throwable->getMessage());
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
