<?php

namespace App\Services\Dashboard;

use App\Models\Dashboard;
use \App\Services\Service;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

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
                if($file){
                    $name = $this->prepareFileName($dashboard, $file) ?? date('y-m-d-H-i-s');
                    $dashboard->addMedia($file->path())->setFileName($name)->toMediaCollection('dashboards');
                }
                return $dashboard;
            }
        }catch (\Throwable $exception){
            Log::error(__METHOD__." ".$exception->getMessage());
        }
        return null;

    }

    private function prepareFileName($dashboard, $file):?string
    {
        if($file){
            $name = Str::slug($dashboard->name, '_');
            return $name.".".explode('/',$file->getClientMimeType())[1];
        }
        return null;
    }
}
