<?php declare(strict_types=1);

namespace JoeCianflone\SuperModules\Commands\Make;

use JoeCianflone\SuperModules\Concerns\MakeInModule;
use Illuminate\Routing\Console\MiddlewareMakeCommand;

class MakeMiddlewareCommand extends MiddlewareMakeCommand
{
    use MakeInModule;

    private ?string $moduleKey  = "module_middleware";
}
