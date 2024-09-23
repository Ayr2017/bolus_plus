<?php

namespace App\Services\Dashboard;

use App\Models\Dashboard;
use \App\Services\Service;
use Illuminate\Support\Facades\Log;

class DashboardService extends Service
{
    public function __construct()
    {
        parent::__construct();
    }

    public function storeDashboard(array $data,  $file):?Dashboard
    {
        try {
            $dashboard = Dashboard::query()->create($data);
            if($dashboard) {
                $dashboard->addMedia($file->path())->toMediaCollection('dashboards');
                return $dashboard;
            }
        }catch (\Throwable $exception){
            Log::error(__METHOD__." ".$exception->getMessage());
        }
        return null;

    }
}
