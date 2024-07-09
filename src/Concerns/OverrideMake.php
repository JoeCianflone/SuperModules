<?php declare(strict_types=1);

namespace JoeCianflone\SuperModules\Concerns;

use Illuminate\Support\Str;
use Symfony\Component\Console\Input\InputArgument;

trait OverrideMake
{
    protected function configNamespace()
    {
        return '';
    }

    protected function getArguments()
    {
        return [
            ['module', InputArgument::REQUIRED, 'The name of the module'],
            ['name', InputArgument::REQUIRED, 'The name of the '.strtolower($this->type)],
        ];
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace. config('super-modules.namespaces.'.$this->configNamespace());
    }

    protected function getPath($name)
    {
        $name = Str::replaceFirst($this->rootNamespace(), '', $name);
        $extension = pathinfo($name, PATHINFO_EXTENSION);
        $moduleFolder = strtolower($this->argument('module'));
        $srcPath = $this->getSrcPath($moduleFolder);

        if ($extension === '') {
            $name .= '.php';
        }

        return $srcPath.'/'.str_replace('\\', '/', $name);
    }

    protected function getSrcPath($moduleName)
    {
        $srcFolder = $this->useSrcPath() ? config('super-modules.srcFolderName') : "";

        return config('super-modules.moduleFolderName')."/$moduleName/$srcFolder";
    }
    protected function rootNamespace()
    {
        return config('super-modules.rootNamespace') . "\\".$this->argument('module');
    }

    protected function setConfigNamespace()
    {
        return config('super-modules.namespaces.'.$this->configNamespace());
    }

    protected function useSrcPath()
    {
        return true;
    }
}
