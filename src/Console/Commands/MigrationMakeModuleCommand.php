<?php declare(strict_types=1);

namespace JoeCianflone\SuperModules\Console\Commands;

use Illuminate\Database\Console\Migrations\BaseCommand;

class MigrationMakeModuleCommand extends BaseCommand
{
    protected $signature = 'module:migration {module : The name of the module} {name : The name of the migration}
        {--create= : The table to be created}
        {--table= : The table to migrate}';

    public function handle()
    {
        $this->call('make:migration', [
            'name' => $this->argument('name'),
            '--table' => $this->option('table'),
            '--path' => 'modules/'.$this->argument('module').'/'.config('super-modules.namespaces.migration'),
        ]);
    }
}
