<?php declare(strict_types=1);

namespace JoeCianflone\SuperModules;

use Illuminate\Support\Str;

readonly class Module
{
    public string $fullPath;
    public string $moduleFullPath;
    public string $pascalModule;
    public string $pascalNamespace;

    public function __construct(
        public string $root,
        public string $namespace,
        public string $module
    ) {
        $this->fullPath = base_path($this->root);
        $this->pascalNamespace = Str::studly($this->namespace);
        $this->pascalModule = Str::studly($this->module);

        $this->moduleFullPath = $this->fullPath ."/{$this->pascalNamespace}";
    }

}
