<?php

namespace App\Services\Sanctum;

use App\Models\User;
use \App\Services\Service;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class SanctumService extends Service
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param mixed $validated
     * @return mixed
     * @throws ValidationException
     */
    public function createToken(mixed $validated)
    {
        $user = User::where('email', $validated['email'])->first();

        if (!$user || !Hash::check($validated['password'], $user->password)) {
            throw ValidationException::withMessages([
                'email' => [__('auth.failed')],
            ]);
        }

        return $user->createToken($validated['device_name'])->plainTextToken;
    }
}
