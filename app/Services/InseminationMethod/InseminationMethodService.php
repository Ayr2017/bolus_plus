<?php

namespace App\Services\InseminationMethod;

use App\Helpers\ErrorLog;
use App\Models\InseminationMethod;
use \App\Services\Service;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;

class InseminationMethodService extends Service
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param array $data
     * @return LengthAwarePaginator
     */
    public function getInseminationMethods(array $data): LengthAwarePaginator
    {
        $perPage = Arr::get($data, 'per_page', 50);
        $page = Arr::get($data, 'page', 1);

        return  InseminationMethod::query()->orderBy('id')->paginate(perPage: $perPage, page: $page);
    }



    public function updateInseminationMethod(array $validated, InseminationMethod $inseminationMethod): ?InseminationMethod
    {
        try {
            $result = $inseminationMethod->update($validated);
            if($result){
                return $inseminationMethod;
            }
        } catch (\Exception $e) {
            Log::error(__METHOD__." ".$e->getMessage());
        }
        return null;
    }

    /**
     * @param mixed $data
     * @return InseminationMethod|null
     */
    public function storeInseminationMethod(mixed $data) :?InseminationMethod
    {
        try {
            $inseminationMethod = InseminationMethod::query()->create($data);

            if($inseminationMethod){
                return $inseminationMethod;
            }
        } catch (\Exception $e) {
            Log::error(__METHOD__." ".$e->getMessage());
        }
        return null;

    }

    /**
     * @param int $id
     * @return InseminationMethod|null
     */
    public function show(InseminationMethod $inseminationMethod) : InseminationMethod
    {
        return $inseminationMethod;
    }

    public function deleteInseminationMethod(InseminationMethod $inseminationMethod):bool
    {
        try {
            $result  = $inseminationMethod->delete();
            if($result){
                return true;
            }
        } catch (\Exception $e) {
            Log::error(__METHOD__." ".$e->getMessage());
        }
        return false;
    }
}
