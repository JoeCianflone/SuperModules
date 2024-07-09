<?php declare(strict_types=1);

namespace JoeCianflone\SuperModules\Console\Commands;

use JoeCianflone\SuperModules\Concerns\OverrideMake;
use Illuminate\Database\Console\Seeds\SeederMakeCommand;

class SeederMakeModuleCommand extends SeederMakeCommand
{
    use OverrideMake;

    protected $name = 'module:seeder';

    protected function configNamespace()
    {
        return 'seeder';
    }
}
