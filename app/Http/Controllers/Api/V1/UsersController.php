<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $currentUser = auth()->user();
            return response()->json(
                [
                    'message' => 'OK',
                    'data' => User::query()->paginate($request->per_page ?? 50),
                    'error' => null,
                ], 200);
        }catch (\Throwable $throwable){
            Log::error(__METHOD__.", line:".__LINE__." ".$throwable->getMessage());
        }

        return response()->json(
            [
                'message' => 'Error',
                'data' =>null,
                'error' => 'Server Error',
            ], 500);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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

    public function getCurrentUser(): JsonResponse
    {
        try {
            $currentUser = auth()->user();
            return response()->json(
                [
                    'message' => 'OK',
                    'data' =>[
                        'current_user' => $currentUser,
                        ],
                    'error' => null,
                ], 200);
        }catch (\Throwable $throwable){
            Log::error(__METHOD__.", line:".__LINE__." ".$throwable->getMessage());
        }

        return response()->json(
            [
                'message' => 'Error',
                'data' =>null,
                'error' => 'Server Error',
            ], 500);

    }
}
