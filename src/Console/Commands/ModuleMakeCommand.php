<?php

declare(strict_types=1);

namespace JoeCianflone\SuperModules\Console\Commands;

use Composer\Factory;
use Composer\Json\JsonFile;
use Illuminate\Support\Str;
use Illuminate\Console\GeneratorCommand;

class ModuleMakeCommand extends GeneratorCommand
{
    protected $name = 'make:module';

    private string $module;

    public function handle()
    {
        $this->module = strtolower($this->argument('name'));
        $structure = config('super-modules.structure');

        $path = config('super-modules.moduleFolderName').'/'.$this->module;

        $this->line('Writing folder structure: '.$path);
        $this->buildStructure($structure, $path);

        $this->line('Writing routes file ');
        $this->buildRoutes();

        $this->line('Writing config file ');
        $this->buildConfig();

        $this->line('Writing composer file ');
        $this->buildComposer();

        $this->line('Writing module service provider ');
        $this->buildServiceProvider();

        $this->line('Updating the main composer.json ');
        $this->updateMainComposer();
        $this->line('Done.');
        $this->info("you should now run composer update");
    }

    protected function getStub()
    {
        return '';
    }

    private function buildComposer()
    {
        $this->call('make:any', [
            'name' => 'composer.json',
            'stub' => 'module.composer.stub',
            'module' => $this->module,
            '--src' => false,
            'tokens' => [
                '{{namespace}}' => strtolower(config('super-modules.rootNamespace')),
                '{{module}}' => $this->module,
                '{{ModuleRootNamespace}}' => config('super-modules.rootNamespace'),
                '{{ServiceProviderNamespace}}' => Str::replace('\\', '\\\\', config('super-modules.namespaces.provider')),
                '{{ModuleName}}' => $this->argument('name'),
            ],
        ]);
    }

    private function buildConfig()
    {
        $this->call('make:any', [
            'name' => 'config.php',
            'stub' => 'module.config.stub',
            'module' => $this->module,
            '--src' => false,
            'tokens' => [
                '{{module}}' => $this->argument('name'),
            ],
        ]);

        $path = config('super-modules.moduleFolderName').'/'.$this->module;

        $this->files->move("$path/config.php", "$path/$this->module.config.php");
    }

    private function buildRoutes()
    {
        $this->call('make:any', [
            'name' => 'routes.php',
            'stub' => 'module.routes.stub',
            'module' => $this->module,
            '--src' => false,
        ]);

        $path = config('super-modules.moduleFolderName').'/'.$this->module;

        $this->files->move("$path/routes.php", "$path/$this->module.routes.php");
    }

    private function buildServiceProvider()
    {
        $providerName = $this->argument('name').'ServiceProvider';

        $this->call('make:any', [
            'name' => config('super-modules.namespaces.provider').'\\'.$providerName,
            'stub' => 'module.serviceprovider.stub',
            'module' => $this->module,
            '--src' => true,
            'tokens' => [
                '{{namespace}}' => config('super-modules.rootNamespace')."\\".$this->argument('name').config('super-modules.namespaces.provider'),
                '{{class}}' => $providerName,
                '{{moduleName}}' => $this->module,
                '{{migrationPath}}' => Str::replace('\\', '/', config('super-modules.namespaces.migration')),
                '{{routePath}}' => Str::replace('\\', '/', config('super-modules.namespaces.route')),
                '{{configPath}}' => Str::replace('\\', '/', config('super-modules.namespaces.config')),
            ],
        ]);
    }

    private function buildStructure($structure, $path)
    {
        collect($structure)->each(function ($v, $k) use ($path) {
            $k = str_replace('{{src}}', config('super-modules.srcFolderName'), $k);
            $path .= "/$k";
            if (is_array($v) && count($v) > 0) {
                return $this->buildStructure($v, $path);
            }

            $this->files->makeDirectory(path: $path, recursive: true);

            return $path;
        });
    }

    private function updateMainComposer()
    {
        $original_working_dir = getcwd();
        chdir($this->laravel->basePath());
        $json_file = new JsonFile(Factory::getComposerFile());
        $definition = $json_file->read();

        $module_config = [
            'type' => 'path',
            'url' => strtolower(config('super-modules.module_namespace').'/*'),
            'options' => [
                'symlink' => true,
            ],
        ];

        $composerName = Str::lower(config('super-modules.rootNamespace')).'/'.$this->module;
        $definition['require']["{$composerName}"] = '*';
        $json_file->write($definition);
    }
}
