# SuperModules

I build kinda big-ish things and to that end I love modules. There are a couple really 
good module packages out there, but I wanted 1) a very particular module style 
and 2) the ability to change that structure whenever I fancy. 

To that end I've created this package. SuperModules has a distinct package layout
and is flexible enough to allow you to change it! 

Before we dig into *how* to use this, let me show you the structure that I 
have as the default. You can change this, all of this, but here's where we're 
at to begin.

## Project Folders .............................................................
```
module-name
    composer.json
    module-name.routes.php
    module-name.config.php
    database
        factories
        migrations
        seeders
    tests
        Feature
        Unit
    resources
        email
        lang
        views
    Application
        Events
        Listeners
        Services
    Infrastructure
        Exceptions
            {{ModuleName}}ModuleException.php
        Providers
            {{ModuleName}}ServiceProvider.php       
    Presentation
        Http
            Controllers
            Requests
            Responses
        Console
    Domain
        Data
            Collections
            DataObjects
            ValueObjects
        Services
            Actions
            Commands
            Handlers
            Queries 
            QueryBuilders
        Models
            {{ModuleName}}.php
        Repositories
            {{ModuleName}}Repository.php
```

I call this style DDDish because I do break things into App/Infra/Present/Domain
but I'm probably a little liberay in what I put into those folders.   

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
php artisan make:module {module-name}
php artisan module:migration {module-name}
php artisan module:migrate:fresh {module-name}
```
