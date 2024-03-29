<?php declare(strict_types=1);

return [
    'module_namespace' => 'SuperModules',

    'module_path' => 'modules',
    'module_src_folder' => 'src',

    'make_composer' => '/',
    'make_module_service_provider' => 'src/',
    'make_cast' => 'src/Domain/Data/Casts/',
    'make_command' => 'src/Presentation/Console/',
    'make_controller' => 'src/Presentation/Http/Controllers/',
    'make_config' => 'config/',
    'make_event' => 'src/Services/Events/',
    'make_exception' => 'src/Exceptions/',
    'make_factory' => 'database/factories/',
    'make_job' => 'src/Presentation/Jobs/',
    'make_listener' => 'src/Services/Listeners/',
    'make_middleware' => 'src/Presentation/Http/Middleware/',
    'make_migration' => 'database/migrations/',
    'make_model' => 'src/Domain/Models/',
    'make_provider' => 'src/Providers/',
    'make_request' => 'src/Presentation/Http/Requests/',
    'make_resource' => 'src/Presentation/Http/Resources/',
    'make_rule' => 'src/Presentation/Http/Rules/',
    'make_seeder' => 'database/seeders/',
    'make_test' => 'tests/',
];
