<?php

namespace App\Console\Commands;

use AllowDynamicProperties;
use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Pluralizer;
use Illuminate\Support\Str;

#[AllowDynamicProperties] class MakeService extends Command
{
    private Filesystem $files;

    private string $nameSpace;
    private string $serviceName;
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

    public function __construct(Filesystem $files)
    {
        parent::__construct();

        $this->files = $files;
    }

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $servicePathAndName = $this->argument('service_name');
        $servicePathAndNameCollection = Str::of($servicePathAndName)->explode('/');

        $this->serviceName = $this->hasServicePostfix($servicePathAndNameCollection->last());
        $this->path = 'app/Services/'.$servicePathAndNameCollection->slice(0,-1)->push($this->serviceName)->join('/').'.php';
        $this->nameSpace = rtrim('App\\Services\\'.$servicePathAndNameCollection->slice(0,-1)->implode('\\'),'\\');

        $this->makeDirectory(dirname($this->path));

        $contents = $this->getSourceFile();

        if (!$this->files->exists($this->path)) {
            $this->files->put($this->path, $contents);
            $this->info("File : {$this->path} created");
        } else {
            $this->info("File : {$this->path} already exits");
        }
    }

    private function hasServicePostfix(string $serviceName): string
    {
        $hasRightEnd = Str::of($serviceName)->endsWith('Service');
        if ($hasRightEnd) {
            return $serviceName;
        }
        return $serviceName.'Service';
    }

    /**
     * Build the directory for the class if necessary.
     *
     * @param string $path
     * @return string
     */
    protected function makeDirectory(string $path): string
    {
        if (! $this->files->isDirectory($path)) {
            $this->files->makeDirectory($path, 0777, true, true);
        }

        return $path;
    }

    /**
     * Get the stub path and the stub variables
     *
     * @return bool|mixed|string
     *
     */
    public function getSourceFile(): mixed
    {
        return $this->getStubContents($this->getStubPath(), $this->getStubVariables());
    }

    /**
     * Replace the stub variables(key) with the desire value
     *
     * @param $stub
     * @param array $stubVariables
     * @return bool|mixed|string
     */
    public function getStubContents($stub , array $stubVariables = []): mixed
    {
        $contents = file_get_contents($stub);

        foreach ($stubVariables as $search => $replace)
        {
            $contents = str_replace('$'.$search.'$' , $replace, $contents);
        }

        return $contents;

    }

    /**
     * Get the full path of generate class
     *
     * @return string
     */
    public function getSourceFilePath(): string
    {
        return base_path('App\\Services') .'\\' .$this->getSingularClassName($this->serviceName) . '.php';
    }

    /**
     * Return the stub file path
     * @return string
     *
     */
    public function getStubPath(): string
    {
        return __DIR__ . '/../../../stubs/service.stub';
    }

    public function getStubVariables(): array
    {
        $serviceName = $this->getSingularClassName($this->serviceName);
        $modelName = Str::replaceLast('Service', '', $serviceName); // Убираем "Service" из имени класса для модели
        $modelVariable = lcfirst($modelName);

        return [
            'NAMESPACE' => $this->nameSpace,
            'CLASS_NAME' => $serviceName,
            'MODEL_NAME' => $modelName,
            'modelVariable' => $modelVariable,
        ];
    }

    /**
     * Return the Singular Capitalize Name
     * @param string $name
     * @return string
     */
    public function getSingularClassName(string $name): string
    {
        return ucwords(Pluralizer::singular($name));
    }
}
