<?php declare(strict_types=1);

namespace JoeCianflone\SuperModules\Commands\Make;

use JoeCianflone\SuperModules\Concerns\MakeInModule;
use Illuminate\Foundation\Console\ExceptionMakeCommand;

class MakeExceptionCommand extends ExceptionMakeCommand
{
    use MakeInModule;

    private ?string $moduleKey  = "module_exceptions";
}
