# SuperModules

I build kinda big-ish things and to that end I love modules. There are a couple really 
good module packages out there, but I wanted 1) a very particular module style 
and 2) the ability to change that structure whenever I fancy. 

To that end I've created this package. SuperModules has a distinct package layout
and is flexible enough to allow you to change it! 

Before we dig into *how* to use this, let me show you the structure that I 
have as the default. You can change this, all of this, but here's where we're 
at to begin.

## Project Folders 
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
but I'm probably a little liberal in what I put into those folders. But, it 
doesn't matter you can change the whole structure up yourself

## Commands 

Notes coming soon
