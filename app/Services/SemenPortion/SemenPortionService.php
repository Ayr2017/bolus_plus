<?php

namespace App\Services\SemenPortion;

use App\Helpers\ErrorLog;
use App\Models\SemenPortion;
use \App\Services\Service;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;

class SemenPortionService extends Service
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param array $data
     * @return LengthAwarePaginator
     */
    public function getSemenPortions(array $data): LengthAwarePaginator
    {
        $perPage = Arr::get($data, 'per_page', 50);
        $page = Arr::get($data, 'page', 1);

        return  SemenPortion::query()->orderBy('id')->paginate(perPage: $perPage, page: $page);
    }

    public function deleteSemenPortion(SemenPortion $semenPortion):bool
    {
        try {
            $result  = $semenPortion->delete();
            if($result){
                return true;
            }
        } catch (\Exception $e) {
            Log::error(__METHOD__." ".$e->getMessage());
        }
        return false;
    }

    public function updateSemenPortion(array $validated, SemenPortion $semenPortion): ?SemenPortion
    {
        try {
            $result = $semenPortion->update($validated);
            if($result){
                return $semenPortion;
            }
        } catch (\Exception $e) {
            Log::error(__METHOD__." ".$e->getMessage());
        }
        return null;
    }

    /**
     * @param mixed $data
     * @return SemenPortion|null
     */
    public function storeSemenPortion(mixed $data) :?SemenPortion
    {
        try {
            $semenPortion = SemenPortion::query()->create($data);
            if($semenPortion){
                return $semenPortion;
            }
        } catch (\Exception $e) {
            Log::error(__METHOD__." ".$e->getMessage());
        }
        return null;

    }

    /**
     * @param int $id
     * @return SemenPortion|null
     */
    public function show(SemenPortion $semenPortion) : SemenPortion
    {
        return $semenPortion;
    }


}
