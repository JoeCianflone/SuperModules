<?php declare(strict_types=1);

return [
    [
        "module_root" => 'Modules',
        "module_root_namespace" => "JoeCianflone",
        "module_map" => [
            'module-composer:composer.json',
            'module-config:/config' => [
                'module.config.php'
            ],
            'module-database:/database' => [
                'module-migrations:/migrations' => [],
                'module-factories:/factories' => [],
                'module-seeders:/seeders' => []
            ],
            '/routes' => [
                'web.routes.php',
                'api.routes.php'
            ],
            'module-src:/src' => [
                'module-service-provider:ModuleServiceProvider.php',
                'module-providers:/Providers' => [
                    'RouteServiceProvider.php',
                ],
                '/Domain' => [
                    'module-model:/Models' => [
                        'Module.php'
                    ]
                ],
                '/Presentation' => [
                    '/Http' => [
                        'module-contollers:/Controllers' => [],
                        'module-request:/Requests' => [],
                        'module-resource:/Resources' => [],
                    ],
                    'module-commands:/Commands' => [],
                ]
            ]
        ]
    ]
];
