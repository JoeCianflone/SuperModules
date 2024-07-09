<?php declare(strict_types=1);

namespace JoeCianflone\SuperModules\Console\Commands;

use JoeCianflone\SuperModules\Concerns\OverrideMake;
use Illuminate\Routing\Console\ControllerMakeCommand;
use JoeCianflone\SuperModules\Concerns\OverrideMatchingTest;

class ControllerMakeModuleCommand extends ControllerMakeCommand
{
    use OverrideMake;
    use OverrideMatchingTest;

    protected $name = 'module:controller';

    protected function configNamespace()
    {
        return 'controller';
    }
}
