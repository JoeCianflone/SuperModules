<?php declare(strict_types=1);

namespace JoeCianflone\SuperModules\Commands\Module;

use Illuminate\Support\Str;
use JoeCianflone\SuperModules\Module;
use Illuminate\Support\Facades\Config;
use Illuminate\Console\GeneratorCommand;

use JoeCianflone\SuperModules\Concerns\CanUpdateComposer;

class ModuleMakeCommand extends GeneratorCommand
{
    use CanUpdateComposer;

    protected $name = "module:make";

    protected $type = "Module";

    public function getStub()
    {
    }

    public function handle()
    {
        $module = new Module(
            name: Str::lower($this->argument('name')),
            namespace: Str::lower(Config::get('super-modules.module_namespace')),
            root: Config::get('super-modules.module_path'),
        );

        $this->files->copyDirectory(__DIR__.'/../../../stubs/Module', $module->moduleFullPath);
        $this->info('Wrote Structure');

        $this->writeComposer($module);
        $this->writeConfig($module);
        $this->writeServiceProvider($module);

        $this->updateRootComposerFile($module);

        return self::SUCCESS;
    }

    private function writeComposer(Module $module): void
    {
        $this->call('make:any', [
            'module' => $module->name,
            'name' => $module->makePath('composer') . 'composer.json',
            'stub' => 'module.composer.stub',
            'namespace' => '',
            'tokens' => [
                '{{namespace}}' => $module->namespace,
                '{{module}}' => $module->name,
                '{{PascalNamespace}}' => $module->pascalNamespace,
                '{{PascalModule}}' => $module->pascalName,
            ]
        ]);
    }

    private function writeConfig(Module $module): void
    {
        $this->call('make:any', [
            'module' => $module->name,
            'name' => $module->makePath('config'). $module->name.'.config.php',
            'stub' => 'module.config.stub',
            'namespace' => '',
            'tokens' => [
                "{{module}}" => $module->name,
            ]
        ]);
    }

    private function writeServiceProvider(Module $module)
    {
        $this->call('make:any', [
            'module' => $module->name,
            'name' => $module->makePath('module_service_provider') . $module->pascalName.'ServiceProvider.php',
            'stub' => 'module.ServiceProvider.stub',
            'namespace' => '',
            'tokens' => [
                "{{class}}" => $module->pascalName.'ServiceProvider',
                // "{{module_database_migrations}}" => $module->path('module_database_migrations'),
                // "{{config}}" => $module->relPath('module_config'). "/". $module->name . ".config.php",
                // "{{config_name}}" =>  $module->name . ".config.php",
                // "{{module_service_providers_namespace}}" => $module->namespace('module_service_providers'),
            ]
        ]);
    }


}
