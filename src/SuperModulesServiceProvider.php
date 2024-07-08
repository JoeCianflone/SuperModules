<?php declare(strict_types=1);

namespace JoeCianflone\SuperModules;

use Illuminate\Support\ServiceProvider;
use JoeCianflone\SuperModules\Console\Commands\AnyMakeCommand;
use JoeCianflone\SuperModules\Console\Commands\ModuleMakeCommand;
use JoeCianflone\SuperModules\Console\Commands\CastMakeModuleCommand;
use JoeCianflone\SuperModules\Console\Commands\ModelMakeModuleCommand;
use JoeCianflone\SuperModules\Console\Commands\ChannelMakeModuleCommand;
use JoeCianflone\SuperModules\Console\Commands\FactoryMakeModuleCommand;
use JoeCianflone\SuperModules\Console\Commands\MigrationMakeModuleCommand;

class SuperModulesServiceProvider extends ServiceProvider
{
    private array $makeCommands = [
        AnyMakeCommand::class,
        CastMakeModuleCommand::class,
        ChannelMakeModuleCommand::class,
        FactoryMakeModuleCommand::class,
        MigrationMakeModuleCommand::class,
        ModelMakeModuleCommand::class,
        ModuleMakeCommand::class,
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
