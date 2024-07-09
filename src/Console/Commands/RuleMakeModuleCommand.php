<?php declare(strict_types=1);

namespace JoeCianflone\SuperModules\Console\Commands;

use Illuminate\Foundation\Console\RuleMakeCommand;
use JoeCianflone\SuperModules\Concerns\OverrideMake;

class RuleMakeModuleCommand extends RuleMakeCommand
{
    use OverrideMake;

    protected $name = 'module:rule';

    protected function configNamespace()
    {
        return 'rule';
    }
}
