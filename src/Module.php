<?php declare(strict_types=1);

namespace JoeCianflone\SuperModules;

use Illuminate\Support\Arr;

readonly class Module
{
    public function __construct(
        public string $name,
        public string $package,
        public array $structure,
        private array $paths
    ) {
    }

    public function namespace($key)
    {
        return $this->get($key, 'namespace');
    }

    public function path($key)
    {
        return $this->get($key, 'path');
    }

    public function relPath($key)
    {
        return $this->get($key, 'relPath');
    }

    private function get($key, $type)
    {
        $key = "{{".$key."}}.$type";
        return Arr::get($this->paths, $key);
    }

}
