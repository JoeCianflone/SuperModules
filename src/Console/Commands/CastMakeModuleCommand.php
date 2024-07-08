<?php declare(strict_types=1);

namespace JoeCianflone\SuperModules\Console\Commands;

use Illuminate\Foundation\Console\CastMakeCommand;
use JoeCianflone\SuperModules\Concerns\OverrideMake;

class CastMakeModuleCommand extends CastMakeCommand
{
    use OverrideMake;

    protected $name = 'module:cast';

    protected function configNamespace()
    {
        return 'cast';
    }
}
