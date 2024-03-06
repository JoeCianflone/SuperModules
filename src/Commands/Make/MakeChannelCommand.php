<?php declare(strict_types=1);

namespace JoeCianflone\SuperModules\Commands\Make;

use JoeCianflone\SuperModules\Concerns\MakeInModule;
use Illuminate\Foundation\Console\ChannelMakeCommand;

class MakeChannelCommand extends ChannelMakeCommand
{
    use MakeInModule;

    private ?string $moduleKey  = "module_channels";

}
