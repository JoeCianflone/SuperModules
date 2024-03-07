<?php declare(strict_types=1);

namespace JoeCianflone\SuperModules;

use Illuminate\Support\ServiceProvider;
use JoeCianflone\SuperModules\Commands\GenerateAnyCommand;
use JoeCianflone\SuperModules\Commands\Make\MakeJobCommand;
use JoeCianflone\SuperModules\Commands\Make\MakeCastCommand;
use JoeCianflone\SuperModules\Commands\Make\MakeMailCommand;
use JoeCianflone\SuperModules\Commands\Make\MakeTestCommand;
use JoeCianflone\SuperModules\Commands\Make\MakeEventCommand;
use JoeCianflone\SuperModules\Commands\Make\MakeChannelCommand;
use JoeCianflone\SuperModules\Commands\Make\MakeConsoleCommand;
use JoeCianflone\SuperModules\Commands\Module\ModuleMakeCommand;
use JoeCianflone\SuperModules\Commands\Make\MakeExceptionCommand;
use JoeCianflone\SuperModules\Commands\Make\MakeMiddlewareCommand;
use JoeCianflone\SuperModules\Commands\Module\ModuleMigrateCommand;

class SuperModulesServiceProvider extends ServiceProvider
{
    protected array $helperCommands = [
        GenerateAnyCommand::class,
    ];
    protected array $makeCommands = [
        MakeCastCommand::class,
        MakeChannelCommand::class,
        MakeConsoleCommand::class,
        MakeEventCommand::class,
        MakeExceptionCommand::class,
        MakeJobCommand::class,
        MakeMailCommand::class,
        MakeMiddlewareCommand::class,
        MakeTestCommand::class,
    ];
    protected array $moduleCommands = [
        ModuleMakeCommand::class,
        ModuleMigrateCommand::class,
    ];

    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands(array_merge($this->makeCommands, $this->moduleCommands, $this->helperCommands));
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
