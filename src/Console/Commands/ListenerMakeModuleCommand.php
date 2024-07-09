<?php declare(strict_types=1);

namespace JoeCianflone\SuperModules\Console\Commands;

use JoeCianflone\SuperModules\Concerns\OverrideMake;
use Illuminate\Foundation\Console\ListenerMakeCommand;

class ListenerMakeModuleCommand extends ListenerMakeCommand
{
    use OverrideMake;

    protected $name = 'module:listener';

    protected function configNamespace()
    {
        return 'listener';
    }
}
