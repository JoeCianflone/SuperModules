<?php declare(strict_types=1);

namespace JoeCianflone\SuperModules\Concerns;

use Illuminate\Support\Str;

trait OverrideMatchingTest
{
    /**
     * Create the matching test case if requested.
     *
     * @param  string  $path
     * @return bool
     */
    protected function handleTestCreation($path)
    {
        if (! $this->option('test') && ! $this->option('pest') && ! $this->option('phpunit')) {
            return false;
        }

        return $this->call('module:test', [
            'module' => $this->argument('module'),
            'name' => Str::of($path)->after($this->laravel['path'])->beforeLast('.php')->append('Test')->replace('\\', '/'),
            '--pest' => $this->option('pest'),
            '--phpunit' => $this->option('phpunit'),
        ]) == 0;
    }
}
