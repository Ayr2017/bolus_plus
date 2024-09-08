<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;

class MakeService extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:service {service_name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new service class';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $servicePathAndName = $this->argument('service_name');
        $servicePathAndNameCollection = Str::of($servicePathAndName)->explode('/');
        $serviceName = $this->hasServicePostfix($servicePathAndNameCollection->last());
        $path = $servicePathAndNameCollection->slice(0,-1);
    }

    private function hasServicePostfix(string $serviceName): string
    {
        $hasRightEnd = Str::of($serviceName)->endsWith('Service');
        if ($hasRightEnd) {
            return $serviceName;
        }
        return $serviceName . 'Service';
    }
}
