<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeDddModule extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:ddd-module {fileName}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create {fileName} with DDD module';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $fileName = $this->argument('fileName');
        $dtoPath = app_path("Modules/{$fileName}/Application/DTO/{$fileName}DTO.php");
        $servicePath = app_path("Modules/{$fileName}/Application/Service/{$fileName}Service.php");
        $repositoryInterfacePath = app_path("Modules/{$fileName}/Domain/Repository/{$fileName}RepositoryInterface.php");
        $repositoryPath = app_path("Modules/{$fileName}/Infrastructure/Repository/{$fileName}Repository.php");

        $fileChecks = [
            ['path' => $dtoPath, 'type' => 'DTO'],
            ['path' => $servicePath, 'type' => 'Service'],
            ['path' => $repositoryInterfacePath, 'type' => 'RepositoryInterface'],
            ['path' => $repositoryPath, 'type' => 'Repository'],
        ];

        foreach ($fileChecks as $fileCheck) {
            if (File::exists($fileCheck['path'])) {
                $this->error("{$fileCheck['type']} {$fileName} already exists!");
                return;
            }
        }

        $this->makeDirectory($dtoPath);
        $this->makeDirectory($servicePath);
        $this->makeDirectory($repositoryInterfacePath);
        $this->makeDirectory($repositoryPath);

        File::put($dtoPath, $this->buildDtoClass($fileName));
        File::put($servicePath, $this->buildServiceClass($fileName));
        File::put($repositoryInterfacePath, $this->buildRepositoryInterfaceClass($fileName));
        File::put($repositoryPath, $this->buildRepositoryClass($fileName));

        $this->info("DTO [$dtoPath] created successfully.");
        $this->info("Service [$servicePath] created successfully.");
        $this->info("Interface Repository [$repositoryInterfacePath] created successfully.");
        $this->info("Repository [$repositoryPath] created successfully.");
    }

    protected function makeDirectory($path)
    {
        if (!File::isDirectory(dirname($path))) {
            File::makeDirectory(dirname($path), 0755, true, true);
        }
    }

    protected function buildDtoClass($fileName)
    {
        $stub = file_get_contents(base_path('stubs/dto.stub'));
        return str_replace('FileName', $fileName, $stub);
    }

    protected function buildServiceClass($fileName)
    {
        $stub = file_get_contents(base_path('stubs/service.stub'));
        return str_replace('FileName', $fileName, $stub);
    }

    protected function buildRepositoryInterfaceClass($fileName)
    {
        $stub = file_get_contents(base_path('stubs/repositoryInterface.stub'));
        return str_replace('FileName', $fileName, $stub);
    }

    protected function buildRepositoryClass($fileName)
    {
        $stub = file_get_contents(base_path('stubs/repository.stub'));
        return str_replace('FileName', $fileName, $stub);
    }
}
