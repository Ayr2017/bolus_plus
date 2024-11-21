<?php

namespace App\Services\RestrictionReason;

use App\Helpers\ErrorLog;
use App\Models\RestrictionReason;
use \App\Services\Service;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;

class RestrictionReasonService extends Service
{
    public function __construct()
    {
        parent::__construct();
    }

    public function deleteRestrictionReason(RestrictionReason $restrictionReason):bool
    {
        try {
            $result  = $restrictionReason->delete();
            if($result){
                return true;
            }
        } catch (\Exception $e) {
            Log::error(__METHOD__." ".$e->getMessage());
        }
        return false;
    }

    public function updateRestrictionReason(array $validated, RestrictionReason $restrictionReason): ?RestrictionReason
    {
        try {
            $result = $restrictionReason->update($validated);
            if($result){
                return $restrictionReason;
            }
        } catch (\Exception $e) {
            Log::error(__METHOD__." ".$e->getMessage());
        }
        return null;
    }

    /**
     * @param mixed $data
     * @return RestrictionReason|null
     */
    public function storeRestrictionReason(mixed $data) :?RestrictionReason
    {
        try {
            $restrictionReason = RestrictionReason::query()->create($data);
            if($restrictionReason){
                return $restrictionReason;
            }
        } catch (\Exception $e) {
            Log::error(__METHOD__." ".$e->getMessage());
        }
        return null;

    }

    /**
     * @param int $id
     * @return RestrictionReason|null
     */
    public function show(RestrictionReason $restrictionReason) : RestrictionReason
    {
        return $restrictionReason;
    }

    /**
     * @param array $data
     * @return LengthAwarePaginator
     */
    public function getRestrictionReasons(array $data): LengthAwarePaginator
    {
        $perPage = Arr::get($data, 'per_page', 50);
        $page = Arr::get($data, 'page', 1);

        return  RestrictionReason::query()->orderBy('id')->paginate(perPage: $perPage, page: $page);
    }
}
