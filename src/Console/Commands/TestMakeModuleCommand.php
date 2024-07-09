<?php declare(strict_types=1);

namespace JoeCianflone\SuperModules\Console\Commands;

use Illuminate\Foundation\Console\TestMakeCommand;
use JoeCianflone\SuperModules\Concerns\OverrideMake;

class TestMakeModuleCommand extends TestMakeCommand
{
    use OverrideMake;

    protected $name = 'module:test';

    protected function configNamespace()
    {
        if ($this->option('unit')) {
            return 'test_unit';
        }

        return 'test_feature';
    }

    protected function useSrcPath()
    {
        return false;
    }

}
