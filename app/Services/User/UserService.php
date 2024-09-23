<?php

namespace App\Services\User;

use App\Models\User;
use \App\Services\Service;
use Illuminate\Support\Facades\Log;

class UserService extends Service
{
    public function __construct()
    {
        parent::__construct();
    }

    public function updateRoles(array $data, User $user): ?User
    {
        try {
            $result = $user->syncRoles($data['roles_names']);
            if($result){
                return $user->load('roles');
            }
        }catch (\Throwable $throwable){
            Log::error(__METHOD__.' '.$throwable->getMessage());
        }

        return null;
    }
}
