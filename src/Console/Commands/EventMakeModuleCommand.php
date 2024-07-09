<?php declare(strict_types=1);

namespace JoeCianflone\SuperModules\Console\Commands;

use Illuminate\Foundation\Console\EventMakeCommand;
use JoeCianflone\SuperModules\Concerns\OverrideMake;

class EventMakeModuleCommand extends EventMakeCommand
{
    use OverrideMake;

    protected $name = 'module:event';

    protected function configNamespace()
    {
        return 'event';
    }
}
