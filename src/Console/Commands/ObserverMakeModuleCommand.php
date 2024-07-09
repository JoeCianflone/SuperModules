<?php declare(strict_types=1);

namespace JoeCianflone\SuperModules\Console\Commands;

use JoeCianflone\SuperModules\Concerns\OverrideMake;
use Illuminate\Foundation\Console\ObserverMakeCommand;

class ObserverMakeModuleCommand extends ObserverMakeCommand
{
    use OverrideMake;

    protected $name = 'module:observer';

    protected function configNamespace()
    {
        return 'observer';
    }
}
