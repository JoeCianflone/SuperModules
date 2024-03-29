<?php declare(strict_types=1);

namespace JoeCianflone\SuperModules\Concerns;

use Composer\Factory;
use Composer\Json\JsonFile;
use Illuminate\Support\Arr;
use JoeCianflone\SuperModules\Module;

trait CanUpdateComposer
{
    protected function sortComposerPackages(array $packages): array
    {
        $prefix = function ($requirement) {
            return preg_replace(
                [
                    '/^php$/',
                    '/^hhvm-/',
                    '/^ext-/',
                    '/^lib-/',
                    '/^\D/',
                    '/^(?!php$|hhvm-|ext-|lib-)/',
                ],
                [
                    '0-$0',
                    '1-$0',
                    '2-$0',
                    '3-$0',
                    '4-$0',
                    '5-$0',
                ],
                $requirement
            );
        };

        uksort($packages, function ($a, $b) use ($prefix) {
            return strnatcmp($prefix($a), $prefix($b));
        });

        return $packages;
    }
    protected function updateRootComposerFile(Module $module): void
    {
        $original_working_dir = getcwd();
        chdir($this->laravel->basePath());

        $json_file = new JsonFile(Factory::getComposerFile());
        $definition = $json_file->read();

        if (! isset($definition['repositories'])) {
            $definition['repositories'] = [];
        }

        if (! isset($definition['require'])) {
            $definition['require'] = [];
        }

        $module_config = [
            'type' => 'path',
            'url' => strtolower(config('super-modules.module_namespace').'/*'),
            'options' => [
                'symlink' => true,
            ],
        ];

        $composerName = "$module->namespace/$module->name";

        $has_changes = false;

        $repository_already_exists = collect($definition['repositories'])
            ->contains(function ($repository) use ($module_config) {
                return $repository['url'] === $module_config['url'];
            });

        if ($repository_already_exists === false) {
            $this->line(" - Adding path repository for <info>{$module_config['url']}</info>");
            $has_changes = true;

            if (Arr::isAssoc($definition['repositories'])) {
                $definition['repositories'][$this->getModuleName()] = $module_config;
            } else {
                $definition['repositories'][] = $module_config;
            }
        }

        if (! isset($definition['require'][$composerName])) {
            $has_changes = true;

            $definition['require']["{$composerName}"] = '*';
            $definition['require'] = $this->sortComposerPackages($definition['require']);
        }

        if ($has_changes) {
            $json_file->write($definition);
            $this->line(" - Wrote to <info>{$json_file->getPath()} rember to run composer dump</info>");
        } else {
            $this->line(' - Nothing to update (repository & require entry already exist)');
        }

        chdir($original_working_dir);
    }
}
