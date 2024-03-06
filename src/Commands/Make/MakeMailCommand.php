<?php declare(strict_types=1);

namespace JoeCianflone\SuperModules\Commands\Make;

use Illuminate\Foundation\Console\MailMakeCommand;
use JoeCianflone\SuperModules\Concerns\MakeInModule;

class MakeMailCommand extends MailMakeCommand
{
    use MakeInModule;

    private ?string $moduleKey  = "module_mail";
}
