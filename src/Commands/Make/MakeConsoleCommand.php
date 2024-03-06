<?php declare(strict_types=1);

namespace JoeCianflone\SuperModules\Commands\Make;

use JoeCianflone\SuperModules\Concerns\MakeInModule;
use Illuminate\Foundation\Console\ConsoleMakeCommand;

class MakeConsoleCommand extends ConsoleMakeCommand
{
    use MakeInModule;

    private ?string $moduleKey  = "module_console";

}
