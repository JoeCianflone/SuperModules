<?php declare(strict_types=1);

namespace JoeCianflone\SuperModules\Console\Commands;

use Illuminate\Foundation\Console\PolicyMakeCommand;
use JoeCianflone\SuperModules\Concerns\OverrideMake;

class PolicyMakeModuleCommand extends PolicyMakeCommand
{
    use OverrideMake;

    protected $name = 'module:policy';

    protected function configNamespace()
    {
        return 'policy';
    }
}
