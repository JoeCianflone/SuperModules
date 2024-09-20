<?php declare(strict_types=1);

// all paths are relative to the modules/module_name folder
return [
    'rootNamespace' => 'SuperModules',
    'moduleFolderName' => 'modules',
    'srcFolderName' => 'src',
    'namespaces' => [
        'casts' => '\Domain\Casts',
        'channel' => '\Services\Broadcasts',
        'command' => '\Presentation\Console',
        'config' => '',
        'controller' => '\Presentation\Controllers',
        'event' => '\Services\Broadcasts\Events',
        'exception' => '\Infrastructure\Exceptions',
        'factory' => 'database\factories',
        'job' => '\Services\Actions\Jobs',
        'listener' => '\Services\Broadcasts\Listeners',
        'mail' => 'resources\email',
        'middleware' => '\Presentation\Middleware',
        'migration' => 'database\migrations',
        'model' => '\Domain\Models',
        'notification' => '\Services\Broadcasts\Notifications',
        'observer' => '\Domain\Observers',
        'policy' => '\Infrastructure\Policies',
        'provider' => '\Infrastructure\Providers',
        'request' => '\Infrastructure\Requests',
        'resource' => '\Infrastructure\Resources',
        'rule' => '\Infrastructure\Rules',
        'route' => '',
        'scope' => '\Domain\QueryBuilders\Scopes',
        'seeder' => 'database\Seeders',
        'test_unit' => '\Tests\Unit',
        'test_feature' => '\Tests\Feature',
    ],
    'files' => [
        'composer' => 'composer.json',
        'routes' => '{module}}.routes.php',
        'config' => '{module}}.config.php',
    ],
    'structure' => [
        'database' => [
            'factories' => [],
            'migrations' => [],
            'seeders' => [],
        ],
        'resources' => [
            'mail' => [],
            'views' => [],
        ],
        'tests' => [
            'Feature' => [],
            'Unit' => [],
        ],
        '{{src}}' => [
            'Services' => [
                'Actions' => [
                    'Commands' => [],
                    'Queries' => [],
                    'Handlers' => [],
                    'Jobs' => [],
                ],
                'Broadcasts' => [
                    'Channels' => [],
                    'Events' => [],
                    'Listeners' => [],
                ],
            ],
            'Domain' => [
                'Collections' => [],
                'Casts' => [],
                'DataObjects' => [],
                'Models' => [],
                'Observers' => [],
                'Repositories' => [],
                'ValueObjects' => [],
                'QueryBuilders' => [
                    'Scopes' => []
                ],
            ],
            'Infrastructure' => [
                'Exceptions' => [],
                'Providers' => [],
                'Policies' => [],
                'Requests' => [],
                'Resources' => [],
                'Rules' => [],
            ],
            'Presentation' => [
                'Controllers' => [],
                'Console' => [],
                'Middleware' => [],
            ],
        ],
    ],
];
