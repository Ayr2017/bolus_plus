<?php

namespace App\Services\Field;

use App\Models\Field;
use \App\Services\Service;
use Illuminate\Support\Facades\Log;

class FieldService extends Service
{
    public function __construct()
    {
        parent::__construct();
    }

    public function storeField(array $data): ?Field
    {
        try {
            $field = Field::query()->create($data);
            if($field){
                return $field;
            }
        }catch (\Exception $exception){
            Log::error(__METHOD__." ".$exception->getMessage());
        }

        return null;
    }

    public function updateField(array $data, Field $field): ?Field
    {
        try {
            $result = $field->update($data);
            if($result){
                return $field;
            }
        }catch (\Exception $exception){
            Log::error(__METHOD__." ".$exception->getMessage());
        }

        return null;
    }
}
