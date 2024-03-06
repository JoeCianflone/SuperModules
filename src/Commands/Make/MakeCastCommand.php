<?php declare(strict_types=1);

namespace JoeCianflone\SuperModules\Commands\Make;

use Illuminate\Foundation\Console\CastMakeCommand;
use JoeCianflone\SuperModules\Concerns\MakeInModule;

class MakeCastCommand extends CastMakeCommand
{
    use MakeInModule;

    private ?string $moduleKey  = "module_casts";
}
