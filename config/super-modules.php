<?php declare(strict_types=1);

return [
    'root_folder' => 'modules',
    'namespace'  => 'Module',
    'make_commands' => [
        'cast' => 'src/Domain/Data/Casts',
        'command' => 'src/Presentation/ConsoleCommands',
        'controller' => 'src/Presentation/Http/Controllers',
        'event' => 'src/Services/Events',
        'exception' => 'src/Exceptions',
        'factory' => 'database/factories',
        'job' => 'src/Presentation/Jobs',
        'listener' => 'src/Services/Listeners',
        'middleware' => 'src/Presentation/Http/Middleware',
        'migration' => 'database/migrations',
        'model' => 'src/Domain/Models',
        'provider' => 'src/Providers',
        'request' => 'src/Presentation/Http/Requests',
        'resource' => 'src/Presentation/Http/Resources',
        'rule' => 'src/Presentation/Http/Rules',
        'seeder' => 'database/seeders',
        'test' => 'tests',
    ],
];
