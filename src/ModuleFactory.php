<?php declare(strict_types=1);

namespace JoeCianflone\SuperModules;

use Illuminate\Support\Str;
use JoeCianflone\SuperModules\Enums\TemplateNames;

final class ModuleFactory
{
    private static string $name;

    public static function make(string $name): Module
    {
        self::$name = $name;
        $structure = self::mapScaffoldToFS(config('super-modules.scaffolding'));

        return new Module(
            name: $name,
            package: Str::lower(config('super-modules.namespaces.root_namespace')."/".$name),
            structure: $structure,
            paths: self::mapScaffoldPaths($structure, ''),
        );

    }

    private static function mapScaffoldPaths(array|string $structure, string $path): array
    {
        return collect($structure)->flatMap(function ($item, $key) use ($path) {
            return match (is_int($key)) {
                true => [
                    $item => [
                        'namespace' => config('super-modules.namespaces.root_namespace') . self::pathToNamespace($path),
                        'path' => $path,
                        'relPath' => self::pathToRel($path)
                    ]
                ],
                false => self::mapScaffoldPaths(
                    structure: $item,
                    path: trim("$path/$key", "/"),
                )
            };
        })->toArray();
    }

    private static function mapScaffoldToFS(array|string $scaffolding): array|string
    {
        if (is_string($scaffolding)) {
            return $scaffolding;
        }

        return collect($scaffolding)->flatMap(function ($folderContent, $folderName) {
            $folderName = match($folderName) {
                TemplateNames::ROOT_FOLDER->value  => config('super-modules.paths.root_folder'),
                TemplateNames::MODULE->value => Str::studly(self::$name),
                TemplateNames::MODULE_SRC_FOLDER->value => config('super-modules.paths.module_src_folder'),
                default => $folderName,
            };

            return [$folderName => self::mapScaffoldToFS(
                scaffolding: $folderContent,
            )];
        })->toArray();
    }

    private static function pathToNamespace(string $path): string
    {
        $path = Str::replace(config('super-modules.paths.root_folder'), '', $path);
        $path = Str::replace(config('super-modules.paths.module_src_folder'), '', $path);
        $path = Str::replace('//', '/', $path);
        $path = collect(explode("/", $path))
            ->map(fn ($i, $k) => [Str::studly($i)])
            ->flatten()
            ->implode("/");

        return Str::replace('/', '\\', $path);
    }

    private static function pathToRel(string $path): string
    {
        $path = Str::replace(config('super-modules.paths.root_folder') . '/'.Str::studly(self::$name) .'/', '', $path);

        return $path;

    }
}
