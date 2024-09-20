<?php declare(strict_types=1);

namespace JoeCianflone\SuperModules;

use Illuminate\Support\ServiceProvider;
use JoeCianflone\SuperModules\Console\Commands\AnyMakeCommand;
use JoeCianflone\SuperModules\Console\Commands\ModuleMakeCommand;
use JoeCianflone\SuperModules\Console\Commands\ModuleRemoveCommand;
use JoeCianflone\SuperModules\Console\Commands\JobMakeModuleCommand;
use JoeCianflone\SuperModules\Console\Commands\CastMakeModuleCommand;
use JoeCianflone\SuperModules\Console\Commands\MailMakeModuleCommand;
use JoeCianflone\SuperModules\Console\Commands\RuleMakeModuleCommand;
use JoeCianflone\SuperModules\Console\Commands\TestMakeModuleCommand;
use JoeCianflone\SuperModules\Console\Commands\EventMakeModuleCommand;
use JoeCianflone\SuperModules\Console\Commands\ModelMakeModuleCommand;
use JoeCianflone\SuperModules\Console\Commands\ScopeMakeModuleCommand;
use JoeCianflone\SuperModules\Console\Commands\PolicyMakeModuleCommand;
use JoeCianflone\SuperModules\Console\Commands\SeederMakeModuleCommand;
use JoeCianflone\SuperModules\Console\Commands\ChannelMakeModuleCommand;
use JoeCianflone\SuperModules\Console\Commands\ConsoleMakeModuleCommand;
use JoeCianflone\SuperModules\Console\Commands\FactoryMakeModuleCommand;
use JoeCianflone\SuperModules\Console\Commands\RequestMakeModuleCommand;
use JoeCianflone\SuperModules\Console\Commands\ListenerMakeModuleCommand;
use JoeCianflone\SuperModules\Console\Commands\ObserverMakeModuleCommand;
use JoeCianflone\SuperModules\Console\Commands\ResourceMakeModuleCommand;
use JoeCianflone\SuperModules\Console\Commands\ExceptionMakeModuleCommand;
use JoeCianflone\SuperModules\Console\Commands\MigrationMakeModuleCommand;
use JoeCianflone\SuperModules\Console\Commands\ControllerMakeModuleCommand;
use JoeCianflone\SuperModules\Console\Commands\MiddlewareMakeModuleCommand;
use JoeCianflone\SuperModules\Console\Commands\NotificationMakeModuleCommand;

class SuperModulesServiceProvider extends ServiceProvider
{
    private array $makeCommands = [
        AnyMakeCommand::class,
        CastMakeModuleCommand::class,
        ChannelMakeModuleCommand::class,
        ConsoleMakeModuleCommand::class,
        ControllerMakeModuleCommand::class,
        EventMakeModuleCommand::class,
        ExceptionMakeModuleCommand::class,
        FactoryMakeModuleCommand::class,
        JobMakeModuleCommand::class,
        ListenerMakeModuleCommand::class,
        MailMakeModuleCommand::class,
        MiddlewareMakeModuleCommand::class,
        MigrationMakeModuleCommand::class,
        ModelMakeModuleCommand::class,
        ModuleMakeCommand::class,
        NotificationMakeModuleCommand::class,
        ObserverMakeModuleCommand::class,
        PolicyMakeModuleCommand::class,
        RequestMakeModuleCommand::class,
        ResourceMakeModuleCommand::class,
        RuleMakeModuleCommand::class,
        ScopeMakeModuleCommand::class,
        SeederMakeModuleCommand::class,
        TestMakeModuleCommand::class,
        ModuleRemoveCommand::class,
    ];

    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands(array_merge($this->makeCommands));
        }

        $this->publishes([
            __DIR__.'/../config/super-modules.php' => config_path('super-modules.php'),
        ], 'super-modules-config');

        $this->publishes([
            __DIR__.'/../stubs' => base_path('stubs'),
        ], 'super-modules-stubs');
    }

    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/super-modules.php', 'super-modules');
    }

}
