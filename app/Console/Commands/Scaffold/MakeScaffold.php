<?php

namespace App\Console\Commands\Scaffold;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class MakeScaffold extends Command
{
    private Filesystem $files;

    private string $nameSpace;
    protected $name;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:scaffold {name} {--namespace=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new scaffold classes';

    public function __construct(Filesystem $files)
    {
        parent::__construct();

        $this->files = $files;

    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->nameSpace = $this->option('namespace');
        $this->name = $this->argument('name');

        $migrationResult = $this->makeMigration();
        $modelResult = $this->makeModel();
    }

    /**
     * @return bool
     */
    private  function makeMigration(): bool
    {
        $tableName = Str::lower(Str::snake(Str::plural($this->name)));

        $migrationExists = collect(File::files(database_path('migrations')))
            ->contains(function ($file) use ($tableName) {
                return str_contains($file->getFilename(), $tableName);
            });

        if ($migrationExists) {
            $this->warn("Migration for table '{$tableName}' already exists.");
            return true;
        }

        $exitCode =Artisan::call('make:migration', [
            'name' => "create_{$tableName}_table", // Название миграции
        ]);

        $output = Artisan::output();

        if ($exitCode === 0) {
            $this->info("Migration created successfully:\n" . $output);
            return true;
        } else {
            $this->error("Failed to create migration. Output:\n" . $output);
            return false;
        }
    }

    private function makeModel(): bool
    {

    }
}
