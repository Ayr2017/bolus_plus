<?php

namespace App\Console\Commands\BolusReading;

use App\Jobs\BolusReading\ProcessDownloadBolusReadings;
use App\Models\Bolus;
use Illuminate\Console\Command;

class DownloadBolusReadingsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:download-bolus-readings-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Bolus::query()->chunk(100, function ($boluses) {
            $boluses->map(function ($bolus) {
                ProcessDownloadBolusReadings::dispatch($bolus->device_number);
            });
        });
    }
}
