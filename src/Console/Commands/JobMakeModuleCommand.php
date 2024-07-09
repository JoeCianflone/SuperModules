<?php declare(strict_types=1);

namespace JoeCianflone\SuperModules\Console\Commands;

use Illuminate\Foundation\Console\JobMakeCommand;
use JoeCianflone\SuperModules\Concerns\OverrideMake;

class JobMakeModuleCommand extends JobMakeCommand
{
    use OverrideMake;

    protected $name = 'module:job';

    protected function configNamespace()
    {
        return 'job';
    }
}
