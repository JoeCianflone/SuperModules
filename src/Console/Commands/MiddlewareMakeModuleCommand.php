<?php declare(strict_types=1);

namespace JoeCianflone\SuperModules\Console\Commands;

use JoeCianflone\SuperModules\Concerns\OverrideMake;
use Illuminate\Routing\Console\MiddlewareMakeCommand;

class MiddlewareMakeModuleCommand extends MiddlewareMakeCommand
{
    use OverrideMake;

    protected $name = 'module:middleware';

    protected function configNamespace()
    {
        return 'middleware';
    }
}
