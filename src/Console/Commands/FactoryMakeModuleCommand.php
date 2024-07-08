<?php declare(strict_types=1);

namespace JoeCianflone\SuperModules\Console\Commands;

use JoeCianflone\SuperModules\Concerns\OverrideMake;
use Illuminate\Database\Console\Factories\FactoryMakeCommand;

class FactoryMakeModuleCommand extends FactoryMakeCommand
{
    use OverrideMake;

    protected $name = 'module:factory';

    protected function configNamespace()
    {
        return 'factory';
    }

    protected function useSrcPath()
    {
        return false;
    }

}
