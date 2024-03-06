<?php declare(strict_types=1);

namespace JoeCianflone\SuperModules\Commands\Make;

use Illuminate\Foundation\Console\JobMakeCommand;
use JoeCianflone\SuperModules\Concerns\MakeInModule;

class MakeJobCommand extends JobMakeCommand
{
    use MakeInModule;

    private ?string $moduleKey  = "module_jobs";
}
