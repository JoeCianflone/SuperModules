<?php declare(strict_types=1);

return [
        'namespaces' => [
            'root_namespace' => 'Super',
        ],
        'paths' => [
            'root_folder' => 'modules',
            'module_src_folder' => 'src',
        ],
        'scaffolding' => [
            '{{root_folder}}' => [
                '{{module}}' => [
                    '{{module_root}}',
                    'config' => [
                        "{{module_config}}",
                    ],
                    'database' => [
                        'factories' => [
                            "{{module_database_factories}}"
                        ],
                        'migrations' => [
                            "{{module_database_migrations}}"
                        ],
                        'seeders' => [
                            "{{module_database_seeders}}"
                        ],
                    ],
                    'routes' => [
                        "{{module_routes}}"
                    ],
                    'resources' => [
                        'mail' => [
                            "{{module_mail}}"
                        ],
                        'lang' => [
                            "{{module_lang}}"
                        ]
                    ],
                    'tests' => [
                        "{{module_tests}}",
                        'Unit' => [],
                        'Feature' => [],
                    ],
                    '{{module_src_folder}}' => [
                        '{{module_service_provider}}',
                        'Providers' => [
                            "{{module_service_providers}}"
                        ],
                        'Exceptions' =>  [
                            "{{module_exceptions}}"
                        ],
                        'Domain' => [
                            'Contracts' => [],
                            'Data' => [
                                'Casts' => [
                                    "{{module_casts}}"
                                ],
                                'DataObjects' => [],
                                'ValueObjects' => [],
                            ],
                            'Handlers' => [],
                            'Concerns' => [],
                            'Repositories' => [
                                "{{module_repositories}}"
                            ],
                            'Collections' => [
                                "{{module_collections}}"
                            ],
                            'Models' => [
                                "{{module_models}}"
                            ],
                            'QueryBuilders' => [
                                'QueryObjects' => [],
                            ],
                        ],
                        'Presentation' => [
                            'Contracts' => [],
                            'Concerns' => [],
                            'Http' => [
                                'Controllers' => [
                                    "{{module_controllers}}"
                                ],
                                'Requests' => [
                                    "{{module_requests}}"
                                ],
                                'Resources' => [
                                    "{{module_resources}}"
                                ],
                            ],
                            'ConsoleCommands' => [
                                "{{module_console}}"
                            ],
                            'Jobs' => [
                                "{{module_jobs}}"
                            ],
                        ],
                        'Services' => [
                            'Contracts' => [],
                            'Concerns' => [],
                            'Actions' => [
                                'QueryActions' => [],
                                'CommandActions' => [],
                            ],
                            'Broadcasting' => [
                                '{{module_channels}}',
                            ],
                            'Events' => [
                                "{{module_events}}"
                            ],
                            'Listeners' => [
                                "{{module_listeners}}"
                            ],
                        ],
                    ],
                ]
            ],
        ],
];
