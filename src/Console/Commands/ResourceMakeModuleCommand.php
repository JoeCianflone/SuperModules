<?php declare(strict_types=1);

namespace JoeCianflone\SuperModules\Console\Commands;

use JoeCianflone\SuperModules\Concerns\OverrideMake;
use Illuminate\Foundation\Console\ResourceMakeCommand;

class ResourceMakeModuleCommand extends ResourceMakeCommand
{
    use OverrideMake;

    protected $name = 'module:resource';

    protected function configNamespace()
    {
        return 'resource';
    }
}
