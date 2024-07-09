<?php declare(strict_types=1);

namespace JoeCianflone\SuperModules\Console\Commands;

use JoeCianflone\SuperModules\Concerns\OverrideMake;
use Illuminate\Foundation\Console\NotificationMakeCommand;

class NotificationMakeModuleCommand extends NotificationMakeCommand
{
    use OverrideMake;

    protected $name = 'module:notification';

    protected function configNamespace()
    {
        return 'notification';
    }
}
