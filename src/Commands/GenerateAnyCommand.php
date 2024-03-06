<?php declare(strict_types=1);

namespace JoeCianflone\SuperModules\Commands;

use Illuminate\Support\Str;
use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputArgument;

class GenerateAnyCommand extends GeneratorCommand
{
    protected $hidden = true;

    protected $name = "make:any";

    protected $type = "file";

    public function getArguments()
    {
        return array_merge(parent::getArguments(), [
            ['stub', InputArgument::REQUIRED, 'stub to replace'],
            ['namespace', InputArgument::OPTIONAL, 'namespace', ''],
            ['module', InputArgument::OPTIONAL, 'module name', null],
            ['tokens', InputArgument::OPTIONAL, 'tokens', []],
        ]);
    }

    public function getStub()
    {
        $stub = $this->argument('stub');
        $customPath = base_path(trim($stub, '/'));

        return file_exists($customPath)
            ? $customPath
            : __DIR__."/../../stubs/".$stub;
    }

    protected function buildClass($name)
    {
        $stub = $this->files->get($this->getStub());
        $stub = $this->replaceTokens($stub, $this->argument('tokens'));

        return $this->replaceNamespace($stub, $name)->replaceClass($stub, $name);
    }

    protected function getNamespace($name)
    {
        $name = Str::replace(config('super-modules.paths.root_folder'), '', $name);
        $name = Str::replace(config('super-modules.paths.module_src_folder'), '', $name);
        $name = Str::replace('\\\\', '\\', $name);

        return trim(implode('\\', array_slice(explode('\\', $name), 0, -1)), '\\');
    }

    protected function getPath($name)
    {
        $name = base_path(Str::replace('\\', '/', Str::replaceFirst($this->rootNamespace() . '\\', '', $name)));
        $ext = pathinfo($name, PATHINFO_EXTENSION);

        return $ext === '' ? $name .= '.php' : $name;
    }

    protected function replaceTokens(string $stub, array $tokens)
    {
        foreach ($tokens as $find => $replace) {
            $stub = str_replace($find, $replace, $stub);
        }

        return $stub;
    }

    protected function rootNamespace()
    {
        return config('super-modules.namespaces.root_namespace');
    }
}
