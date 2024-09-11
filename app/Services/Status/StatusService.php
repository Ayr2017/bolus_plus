<?php

namespace App\Services\Status;

use App\Models\Status;
use \App\Services\Service;
use Illuminate\Support\Facades\Log;

class StatusService extends Service
{
    public function __construct()
    {
        parent::__construct();
    }

    public function storeStatus(array $data): ?Status
    {
        $status = Status
            ::query()
            ->create($data);
        try {


            if ($status) {
                return $status;
            }
        } catch (\Throwable $throwable) {
            Log::error(message: __METHOD__ . " " . $throwable->getMessage());
        }

        return null;
    }

    public function updateStatus(array $validated, Status $status): ?Status
    {
        try {
            $result = $status->update($validated);
            if ($result) {
                return $status;
            }
        } catch (\Throwable $throwable) {
            Log::error(message: __METHOD__ . " " . $throwable->getMessage());
        }

        return null;

    }
}
