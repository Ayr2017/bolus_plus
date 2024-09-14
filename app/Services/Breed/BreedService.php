<?php

namespace App\Services\Breed;

use App\Models\Breed;
use \App\Services\Service;
use Illuminate\Support\Facades\Log;

class BreedService extends Service
{
    public function __construct()
    {
        parent::__construct();
    }

    public function deleteBreed(array $validated, Breed $breed):bool
    {
        try {
            $result  = $breed->delete();
            if($result){
                return true;
            }
        } catch (\Exception $e) {
            Log::error(__METHOD__." ".$e->getMessage());
        }
        return false;
    }

    public function updateBreed(array $validated, Breed $breed): ?Breed
    {
        try {
            $result = $breed->update($validated);
            if($result){
                return $breed;
            }
        } catch (\Exception $e) {
            Log::error(__METHOD__." ".$e->getMessage());
        }
        return null;
    }

    public function storeBreed(mixed $data)
    {
        try {
            $breed = Breed::query()->create($data);
            if($breed){
                return $breed;
            }
        } catch (\Exception $e) {
            Log::error(__METHOD__." ".$e->getMessage());
        }
        return null;

    }
}
