<?php declare(strict_types=1);

namespace JoeCianflone\SuperModules\Console\Commands;

use JoeCianflone\SuperModules\Concerns\OverrideMake;
use Illuminate\Foundation\Console\ChannelMakeCommand;

class ChannelMakeModuleCommand extends ChannelMakeCommand
{
    use OverrideMake;

    protected $name = 'module:channel';

    protected function configNamespace()
    {
        return 'channel';
    }
}
