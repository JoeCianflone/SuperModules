## Project Folders .............................................................

SuperModules
    /config
        super-modules.php
    /stubs
        /module.composer.stub
        /module.route-service-provider.stub
        /module.service-provider.stub
        /module.routes.stub
        /module.config.stub
        /module.lang.stub
    /src
        /Contracts
            /Actions
                /UpdateProjectComposer.php
                /CreatesModuleComposer.php
                /CreatesModule.php
                /UpdatesModule.php
        /Actions
            /UpdateProjectComposer.php
            /CreateModule.php
        /DataObjects
            /ModuleData.php
            /ComposerData.php
        /Concerns
            /IsInModule.php
        /Console
            /Commands
                /Overrides
                    /Database
                    /Make
                /ModuleMakeCommand.php        
        /MonoModsServiceProvider.php


## Structure ...................................................................

/Modules
    /ModuleName
        /config
        /routes
        /database
            /migrations --> artisan make:migration
            /factories  --> artisan make:factory
            /seeders    --> artisan make:seeder
        /src
            /ModuleNameServiceProvider.php
            /Domain
                /Contracts
                /Concerns
                /Models --> artisan make:model
                /Collections --> artisan make:collection
            /Services
                /Events --> artisan make:event
            /Presentation
                /Http
                    /Controllers --> artisan make:controller
                    /Requests    --> artisan make:request
                    /Resources   --> artisan make:resource
                /Commands --> artisan make:command 
                /Jobs
        /tests
            /Unit 
            /Integration
            /Architecture


## Config ......................................................................

```php
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
                    'module-request:/Requests' => []
                    'module-resource:/Resources' => []
                ],
                'module-commands:/Commands' => []
            ]
        ]
    ]
]
```

## Commands ....................................................................

```bash

$ php artisan module:init 
$ php artisan make:module {name}
$ php artisan module:remove {name}
$ php artisan module:list

$ php artisan make:migration create_something_table --module={module}
$ php artisan migrate --module={module}
$ php artisan make:model User --module={module}

```
