<?php

namespace App\Services\Sanctum;

use App\Models\User;
use \App\Services\Service;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class SanctumService extends Service
{
    public function __construct()
    {
        parent::__construct();
    }

    public function createToken(mixed $validated)
    {
        $user = User::where('email', $validated['email'])->first();

        if (!$user || !Hash::check($validated['password'], $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        return $user->createToken($validated['device_name'])->plainTextToken;
    }
}
