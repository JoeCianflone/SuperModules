<?php declare(strict_types=1);

namespace JoeCianflone\SuperModules\Commands\Make;

use Illuminate\Foundation\Console\EventMakeCommand;
use JoeCianflone\SuperModules\Concerns\MakeInModule;

class MakeEventCommand extends EventMakeCommand
{
    use MakeInModule;

    private ?string $moduleKey  = "module_events";
}
