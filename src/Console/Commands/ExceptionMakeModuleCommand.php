<?php declare(strict_types=1);

namespace JoeCianflone\SuperModules\Console\Commands;

use JoeCianflone\SuperModules\Concerns\OverrideMake;
use Illuminate\Foundation\Console\ExceptionMakeCommand;

class ExceptionMakeModuleCommand extends ExceptionMakeCommand
{
    use OverrideMake;

    protected $name = 'module:exception';

    protected function configNamespace()
    {
        return 'exception';
    }
}
