<?php declare(strict_types=1);

namespace JoeCianflone\SuperModules\Console\Commands;

use JoeCianflone\SuperModules\Concerns\OverrideMake;
use Illuminate\Foundation\Console\ConsoleMakeCommand;

class ConsoleMakeModuleCommand extends ConsoleMakeCommand
{
    use OverrideMake;

    protected $name = 'module:command';

    protected function configNamespace()
    {
        return 'command';
    }
}
