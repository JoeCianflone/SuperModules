<?php declare(strict_types=1);

namespace JoeCianflone\SuperModules\Commands\Module;

use Illuminate\Console\Command;
use JoeCianflone\SuperModules\ModuleFactory;

class ModuleMigrateCommand extends Command
{
    protected $signature = 'module:migration {name : The name of the migration}
        {--module= : Module to put the migrations in }
        {--create= : The table to be created}
        {--table= : The table to migrate}';

    public function handle()
    {
        $realpath = null;

        if ($this->option('module')) {
            $module = ModuleFactory::make(
                name: $this->option('module')
            );
            $realpath = base_path($module->path('module_database_migrations'));
        }

        $this->call('make:migration', [
            'name' => $this->argument('name'),
            '--create' => $this->option('create'),
            '--table' => $this->option('table'),
            '--realpath' => $realpath,
            '--path' => $realpath,
        ]);
    }
}
