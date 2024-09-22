<?php

namespace App\Jobs\BolusReading;

use AllowDynamicProperties;
use App\Models\Bolus;
use App\Models\BolusReading;
use App\Services\BolusReading\BolusReadingApiService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

#[AllowDynamicProperties] class ProcessDownloadBolusReadings implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected BolusReadingApiService $apiService;
    public $timeout = 3600;
    public string $bolusNumber;

    /**
     * Create a new job instance.
     */
    public function __construct(string $bolusNumber)
    {
        $this->apiService = App::make(BolusReadingApiService::class);
        $this->bolusNumber = $bolusNumber;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->apiService->pullRecords($this->bolusNumber);
    }
}
