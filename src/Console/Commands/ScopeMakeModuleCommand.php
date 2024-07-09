<?php declare(strict_types=1);

namespace JoeCianflone\SuperModules\Console\Commands;

use Illuminate\Foundation\Console\ScopeMakeCommand;
use JoeCianflone\SuperModules\Concerns\OverrideMake;

class ScopeMakeModuleCommand extends ScopeMakeCommand
{
    use OverrideMake;

    protected $name = 'module:scope';

    protected function configNamespace()
    {
        return 'scope';
    }
}
