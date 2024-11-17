<?php

namespace App\Services\Organisation;

use App\Models\Organisation;
use \App\Services\Service;
use Illuminate\Support\Facades\Log;

class OrganisationService extends Service
{
    public function __construct()
    {
        parent::__construct();
    }

    public function storeOrganisation(array $data):?Organisation
    {
        try {
            $organisation = Organisation::query()->create($data);
            if($organisation){
                return $organisation;
            }
        }catch (\Throwable $throwable){
            Log::error(__METHOD__." ".$throwable->getMessage());
        }
        return null;
    }

    public function updateOrganisation(array $validated, Organisation $organisation): ?Organisation
    {
        try {
            $result = $organisation->update($validated);
            if($result){
                return $organisation;
            }
        }catch (\Throwable $throwable){
            Log::error(__METHOD__." ".$throwable->getMessage());
        }
        return null;
    }


}
