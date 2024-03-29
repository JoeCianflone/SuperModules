<?php declare(strict_types=1);

namespace JoeCianflone\SuperModules;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Config;

readonly class Module
{
    public string $fullPath;
    public string $moduleFullPath;
    public string $moduleRelPath;
    public string $pascalName;
    public string $pascalNamespace;

    public function __construct(
        public string $root,
        public string $namespace,
        public string $name
    ) {
        $this->fullPath = base_path($this->root);
        $this->pascalNamespace = Str::studly($this->namespace);
        $this->pascalName = Str::studly($this->name);
        $this->moduleRelPath = $this->root . '/' . $this->pascalName;
        $this->moduleFullPath = $this->fullPath ."/". $this->pascalName;
    }

    public function makePath(string $key, bool $full = false): string
    {
        $root = $full ? $this->moduleFullPath : $this->moduleRelPath;

        return $root . '/' . Config::get('super-modules.make_'.$key);
    }
}
