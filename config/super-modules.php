<?php declare(strict_types=1);

// all paths are relative to the modules/module_name folder
return [
    'rootNamespace' => 'SuperModules',
    'moduleFolderName' => 'modules',
    'srcFolderName' => 'src',
    'namespaces' => [
        'casts' =>  '\Domain\Data\Casts',
        'channel' =>  '\Application\Broadcasts',
        'command' =>  '\Presentation\Console\Commands',
        'config' => '',
        'controller' =>  '\Presentation\Http\Controllers',
        'event' =>  '\Application\Events',
        'exception' =>  '\Infra\Exceptions',
        'factory' =>  'database\factories',
        'job' =>  '\Domain\Services\Jobs',
        'listener' =>  '\Applications\Listeners',
        'mail' =>  'resources\email',
        'middleware' =>  '\Presentation\Http\Middleware',
        'migration' =>  'database\migrations',
        'model' =>  '\Domain\Models',
        'notification' =>  '\Application\Notifications',
        'observer' =>  '\Domain\Observers',
        'policy' =>  '\Infra\Policies',
        'provider' =>  '\Infra\Providers',
        'request' =>  '\Presentation\Http\Requests',
        'resource' =>  '\Presentation\Http\Resources',
        'rule' =>  '\Infra\Rules',
        'route' => '',
        'scope' =>  '\Domain\QueryBuilders\Scopes',
        'seeder' =>  'database\seeders',
        'test' =>  'tests',
        'pest_test' =>  'tests',
        'pest_dataset' =>  'tests',
    ],
    'files' => [
        'composer' =>  'composer.json',
        'routes' =>  '{{module}}.routes.php',
        'config' =>  '{{module}}.config.php',
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
        '{{src}}' => [
            'Application' => [
                'Broadcasts' => [],
                'Events' => [],
                'Listeners' => [],
                'Services' => [],
            ],
            'Domain' => [
                'Data' => [
                    'Collections' => [],
                    'DataObjects' => [],
                    'ValueObjects' => [],
                ],
                'Models' => [],
                'Repositories' => [],
                'Services' => [
                    'Actions' => [],
                    'Commands' => [],
                    'CommandHandlers' => [],
                    'Queries' => [],
                    'QueryBuilders' => [],
                ],
            ],
            'Infra' => [
                'Exceptions' => [],
                'Providers' => [],
            ],
            'Presentation' => [
                'Http' => [
                    'Controllers' => [],
                    'Requests' => [],
                    'Resources' => [],
                ],
                'Console' => [],
            ],
        ],
        'tests' => [
            'Feature' => [],
            'Unit' => [],
        ],
    ],
];
