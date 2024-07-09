<?php declare(strict_types=1);

namespace JoeCianflone\SuperModules\Console\Commands;

use JoeCianflone\SuperModules\Concerns\OverrideMake;
use Illuminate\Foundation\Console\RequestMakeCommand;

class RequestMakeModuleCommand extends RequestMakeCommand
{
    use OverrideMake;

    protected $name = 'module:request';

    protected function configNamespace()
    {
        return 'request';
    }
}
