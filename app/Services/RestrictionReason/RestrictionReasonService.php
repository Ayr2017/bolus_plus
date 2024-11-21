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

    public function deleteRestrictionReason(RestrictionReason $restriction):bool
    {
        try {
            $result  = $restriction->delete();
            if($result){
                return true;
            }
        } catch (\Exception $e) {
            Log::error(__METHOD__." ".$e->getMessage());
        }
        return false;
    }

    public function updateRestrictionReason(array $validated, RestrictionReason $restriction): ?RestrictionReason
    {
        try {
            $result = $restriction->update($validated);
            if($result){
                return $restriction;
            }
        } catch (\Exception $e) {
            Log::error(__METHOD__." ".$e->getMessage());
        }
        return null;
    }

    public function storeRestrictionReason(mixed $data) :?RestrictionReason
    {
        try {
            $restriction = RestrictionReason::query()->create($data);
            if($restriction){
                return $restriction;
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
    public function show(int $id) : ?RestrictionReason
    {
        try {
            $restriction = RestrictionReason::query()->findOrFail($id);
            if($restriction){
                return $restriction;
            }
        }catch (\Exception $e){
            ErrorLog::write(__METHOD__, __LINE__, $e->getMessage());
        }

        return null;
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
