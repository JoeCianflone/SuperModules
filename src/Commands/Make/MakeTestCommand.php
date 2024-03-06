<?php declare(strict_types=1);

namespace JoeCianflone\SuperModules\Commands\Make;

use Symfony\Component\Console\Input\InputOption;
use Illuminate\Foundation\Console\TestMakeCommand;
use JoeCianflone\SuperModules\Concerns\MakeInModule;

class MakeTestCommand extends TestMakeCommand
{
    use MakeInModule;

    private ?string $moduleKey  = "module_tests";

    protected function getOptions()
    {
        return [
            ['module', null, InputOption::VALUE_REQUIRED, 'name of module'],
            ['force', 'f', InputOption::VALUE_NONE, 'Create the class even if the test already exists'],
            ['unit', 'u', InputOption::VALUE_NONE, 'Create a unit test'],
            ['pest', 'p', InputOption::VALUE_OPTIONAL, 'Create a Pest test', true],
            ['phpunit', null, InputOption::VALUE_OPTIONAL, 'Create a Pest test', false],
        ];
    }

}
