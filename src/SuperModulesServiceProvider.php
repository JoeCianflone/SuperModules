<?php declare(strict_types=1);

namespace JoeCianflone\SuperModules;

use Illuminate\Support\ServiceProvider;
use JoeCianflone\SuperModules\Commands\ModuleInitCommand;
use JoeCianflone\SuperModules\Commands\ModuleMakeCommand;

class SuperModulesServiceProvider extends ServiceProvider
{
    public function boot(): void
    {


        if ($this->app->runningInConsole()) {

            $this->commands([
                ModuleInitCommand::class,
                // ModuleMakeCommand::class,
            ]);
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
