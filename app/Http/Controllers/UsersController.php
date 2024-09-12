<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('name')->get();
        return view('users.index',
            [
                'users' => $users,
                'title' => 'Users',
            ]);
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
    public function show(User $user):View
    {
        return view('users.show', [
            'user' =>  $user,
            'title' => User::class,
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user) :View
    {
        $roles = Role::orderBy('name')->get()->chunk(3);
        return view('users.edit', [
            'user' => $user,
            'title' => User::class,
            'roles' => $roles,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
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
