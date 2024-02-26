<?php declare(strict_types=1);

namespace JoeCianflone\SuperModules\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use JoeCianflone\SuperModules\SuperModulesServiceProvider;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [
            SuperModulesServiceProvider::class
        ];
    }
}
