<?php declare(strict_types=1);

namespace JoeCianflone\SuperModules\Commands\Make;

use Illuminate\Routing\Console\MiddlewareMakeCommand;
use JoeCianflone\SuperModules\Concerns\MakeInModule;

class MakeMiddlewareCommand extends MiddlewareMakeCommand
{
    use MakeInModule;

    private ?string $moduleKey  = "module_middleware";
}
