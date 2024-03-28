<?php declare(strict_types=1);

namespace InsomniaCookies\Orders;

use Illuminate\Support\ServiceProvider;

class OrdersServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__.'/../modules/Orders/database/migrations');
    }

    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/orders.config.php', 'orders.config.php');
    }
}
