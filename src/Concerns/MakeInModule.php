<?php declare(strict_types=1);

namespace JoeCianflone\SuperModules\Concerns;

use Illuminate\Support\Str;
use JoeCianflone\SuperModules\Module;
use JoeCianflone\SuperModules\ModuleFactory;
use Symfony\Component\Console\Input\InputOption;

trait MakeInModule
{
    private ?Module $module = null;

    public function handle()
    {
        if ($this->option('module')) {
            $this->module = ModuleFactory::make(
                name: $this->option('module')
            );
        }

        parent::handle();
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        if ($this->module) {
            return $rootNamespace;
        }

        return parent::getDefaultNamespace($rootNamespace);
    }

    protected function getNamespace($name)
    {
        if ($this->module) {
            $name = $this->module->namespace($this->moduleKey);
            return trim(implode('\\', array_slice(explode('\\', $name), 0, -1)), '\\');
        }

        return parent::getNamespace($name);
    }

    protected function getOptions()
    {
        return array_merge(
            parent::getOptions(),
            [
                ['module', null, InputOption::VALUE_REQUIRED, 'name of module'],
            ]
        );
    }

    protected function getPath($name)
    {
        if ($this->module) {
            $name = Str::replaceFirst($this->rootNamespace() . '\\', '', $name);

            if (Str::lower($this->type) === 'test') {
                $name = match($this->option('unit')) {
                    true => 'Unit/'. $name,
                    false => 'Feature/'. $name
                };
            }
            $name = $this->module->path($this->moduleKey) . '/'. $name;
            $ext = pathinfo($name, PATHINFO_EXTENSION);

            return $ext === '' ? $name .= '.php' : $name;
        }

        return parent::getPath($name);
    }

    protected function qualifyClass($name)
    {
        if ($this->module) {
            return $name;
        }

        return parent::qualifyClass($name);
    }

    protected function rootNamespace()
    {
        if ($this->module) {
            return config('super-modules.namespaces.root_namespace');
        }

        return parent::rootNamespace();
    }
}
