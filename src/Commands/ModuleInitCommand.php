<?php declare(strict_types=1);

namespace JoeCianflone\SuperModules\Commands;

use Illuminate\Console\Command;

class ModuleInitCommand extends Command
{
    protected $name = "module:init";

    public function handle(): int
    {
        $this->info("Time to get your modules all set up!");

        return self::SUCCESS;
    }
}
