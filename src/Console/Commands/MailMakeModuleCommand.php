<?php declare(strict_types=1);

namespace JoeCianflone\SuperModules\Console\Commands;

use Illuminate\Foundation\Console\MailMakeCommand;
use JoeCianflone\SuperModules\Concerns\OverrideMake;

class MailMakeModuleCommand extends MailMakeCommand
{
    use OverrideMake;

    protected $name = 'module:mail';

    protected function configNamespace()
    {
        return 'mail';
    }
}
