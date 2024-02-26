<?php declare(strict_types=1);

namespace JoeCianflone\SuperModules\Commands;

use Illuminate\Console\GeneratorCommand;

class ModuleMakeCommand extends GeneratorCommand
{
    protected $name = "module:make";

    public function handle(): int
    {
        return self::SUCCESS;
    }
}
