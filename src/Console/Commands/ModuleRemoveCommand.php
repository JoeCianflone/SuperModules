<?php

declare(strict_types=1);

namespace JoeCianflone\SuperModules\Console\Commands;

use Composer\Factory;
use Composer\Json\JsonFile;
use Illuminate\Support\Str;
use Illuminate\Console\GeneratorCommand;

class ModuleRemoveCommand extends GeneratorCommand
{
    protected $name = 'module:remove';

    private string $module;

    public function handle()
    {
        $this->module = strtolower($this->argument('name'));

        if ($this->confirm("This will remove {$this->module} files and entries from composer, are you sure?")) {
            $this->files->deleteDirectory(config("super-modules.moduleFolderName") . '/' . $this->module);
            $this->updateMainComposer();
        }
    }

    protected function getStub()
    {
        return '';
    }

    private function updateMainComposer()
    {
        chdir($this->laravel->basePath());
        $json_file = new JsonFile(Factory::getComposerFile());
        $definition = $json_file->read();

        $composerName = Str::lower(config('super-modules.rootNamespace')).'/'.$this->module;

        unset($definition['require']["{$composerName}"]);

        $json_file->write($definition);
    }
}
