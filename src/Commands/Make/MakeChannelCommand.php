<?php declare(strict_types=1);

namespace JoeCianflone\SuperModules\Commands\Make;

use Illuminate\Foundation\Console\ChannelMakeCommand;
use JoeCianflone\SuperModules\Concerns\MakeInModule;

class MakeChannelCommand extends ChannelMakeCommand
{
    use MakeInModule;

    private ?string $moduleKey  = "module_channels";

}
