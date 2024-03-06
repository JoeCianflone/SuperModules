<?php declare(strict_types=1);

namespace JoeCianflone\SuperModules\Commands\Module;

use Illuminate\Support\Str;
use JoeCianflone\SuperModules\Module;
use Illuminate\Support\Facades\Storage;
use Illuminate\Console\GeneratorCommand;
use JoeCianflone\SuperModules\ModuleFactory;
use Illuminate\Contracts\Filesystem\Filesystem;
use JoeCianflone\SuperModules\Concerns\CanUpdateComposer;

class ModuleMakeCommand extends GeneratorCommand
{
    use CanUpdateComposer;

    protected Filesystem $disk;

    protected $name = "module:make";

    protected $type = "Module";

    public function getStub()
    {
    }

    public function handle()
    {
        $module = ModuleFactory::make(
            name: $this->argument('name')
        );

        $this->disk = Storage::build([
            'driver' => 'local',
            'root' => base_path('/'),
        ]);

        $this->writeFolders(folders: $module->structure, path: '');
        $this->writeComposer($module);
        $this->writeRoutes($module);
        $this->writeConfig($module);
        $this->writeServiceProvider($module);

        $this->updateRootComposerFile($module);

        return self::SUCCESS;
    }

    private function writeComposer(Module $module)
    {
        $this->call('make:any', [
            'module' => $module->name,
            'name' => $module->path("module_root").'/composer.json',
            'stub' => 'module.composer.stub',
            'namespace' => '',
            'tokens' => [
                "{{package_name}}" => $module->package,
                "{{module_namespace}}" => Str::replace('\\', '\\\\', $module->namespace('module_root')),
                "{{tests_namespace}}" => Str::replace('\\', '\\\\', $module->namespace('module_tests')),
                "{{database_factories_namespace}}" => Str::replace('\\', '\\\\', $module->namespace('module_database_factories')),
                "{{database_seeders_namespace}}" => Str::replace('\\', '\\\\', $module->namespace('module_database_seeders')),
                "{{module_path}}" => $module->path('module_root'),
                "{{tests_path}}" => $module->path('module_tests'),
                "{{database_factories_path}}" => $module->path('module_database_factories'),
                "{{database_seeders_path}}" => $module->path('module_database_seeders'),
                "{{module_service_provider_namespace}}" => Str::replace('\\', '\\\\', $module->namespace('module_service_provider'))  . Str::studly($module->name) . "ServiceProvider",
            ]
        ]);
    }

    private function writeConfig(Module $module): void
    {
        $this->call('make:any', [
            'module' => $module->name,
            'name' => $module->path("module_config").'/'.$module->name.'.config.php',
            'stub' => 'module.config.stub',
            'namespace' => '',
            'tokens' => [
                "{{module}}" => $module->name,
            ]
        ]);
    }

    private function writeFolders(array $folders, string $path): void
    {
        collect($folders)->each(function ($folderContent, $folderName) use ($path) {
            if (is_int($folderName)) {
                return;
            }
            $path .= "{$folderName}/";
            $this->disk->makeDirectory($path);
            return $this->writeFolders(folders: $folderContent, path: $path);
        });
    }

    private function writeRoutes(Module $module): void
    {
        $this->call('make:any', [
            'module' => $module->name,
            'name' => $module->path("module_routes").'/web.routes.php',
            'stub' => 'module.routes.stub',
            'namespace' => '',
            'tokens' => [
            ]
        ]);

        $this->call('make:any', [
            'module' => $module->name,
            'name' => $module->path("module_routes").'/api.routes.php',
            'stub' => 'module.routes.stub',
            'namespace' => '',
            'tokens' => [
            ]
        ]);
    }

    private function writeServiceProvider(Module $module)
    {
        $this->call('make:any', [
            'module' => $module->name,
            'name' => $module->path("module_service_provider").'/'.Str::studly($module->name).'ServiceProvider.php',
            'stub' => 'module.ServiceProvider.stub',
            'namespace' => '',
            'tokens' => [
                "{{class}}" => Str::studly($module->name).'ServiceProvider',
                "{{module_database_migrations}}" => $module->path('module_database_migrations'),
                "{{config}}" => $module->relPath('module_config'). "/". $module->name . ".config.php",
                "{{config_name}}" =>  $module->name . ".config.php",
                "{{module_service_providers_namespace}}" => $module->namespace('module_service_providers'),
            ]
        ]);

        $this->call('make:any', [
            'module' => $module->name,
            'name' => $module->path("module_service_providers").'/'.'RouteServiceProvider',
            'stub' => 'module.RouteServiceProvider.stub',
            'namespace' => '',
            'tokens' => [
                "{{prefix}}" => $module->name,
                "{{module_route_path}}" => $module->path('module_routes')
            ]
        ]);
    }


}
