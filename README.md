# LifeByte Laravel Project Initialisation Guide & Sample

This project gives a step-by-step guidance on how to initialise a LifeByte Laravel project, and shows a sample project
after initialisation.

## # Initialise Git Repository

1. Create a new Git repository with your ***[PROJECT_NAME]***
2. Create *.gitignore* file in the root path via [gitignore.io](https://www.toptal.com/developers/gitignore/), and
   ignore followings:
    - Laravel
    - Windows
    - macOS
    - Linux
    - PhpStorm+all
    - WebStorm+all
    - VisualStudioCode
    - SublimeText

## # Initialise Laravel Project

For ease of CI/CD, we will put Laravel files in */src* path, so the project file structure will be like this:

```text
|-- lifebyte-laravel-project
    |-- src
        |-- ... // Laravel project files
    |-- .gitignore
    |-- README.md
    |-- ver.txt // Version tag file
    |-- ... // Files for CI/CD
```

1. Go to the project root path
2. Initialise Laravel project with project name as `src`: `curl -s "https://laravel.build/src" | bash`
3. Upsert following environment variables in `.env` and `.env.example`:

      ```dotenv
      APP_NAME=   # your application name. such as "Laravel Sample"
      APP_URL=    # Application URL. such as http://laravel-sample.test

      DB_HOST=mysql
      DB_DATABASE=    # your database name, such as laravel-sample
      DB_USERNAME=root
      DB_PASSWORD=

      MEMCACHED_HOST=memcached

      REDIS_HOST=redis

      COMPOSE_PROJECT_NAME= # Docker container name, such as laravel-sample
      ```

4. Create a database with the same name as `DB_DATABASE` environment value
5. Start application with: `cd src && ./vendor/bin/sail up -d`. (It is recommended to add a zsh/bash alias `sail` to
   replace `./vendor/bin/sail`. See
   how: [Configure A Shell Alisa](https://laravel.com/docs/9.x/sail#configuring-a-shell-alias))
6. Run `sail shell` to access the container CLI
7. Run `php artisan migrate` to migrate tables to the new database
8. Now you can build something incredible! For more development guide:
   see [Development Standards - Laravel](https://github.com/lifebyte-systems/lifebyte-web-development-standards/blob/main/laravel/development-standards.md)
9. Write `README.md` in the root path by
   following [Documentation Standards](https://github.com/lifebyte-systems/lifebyte-web-development-standards/blob/main/laravel/project-documentation-standards.md)

## # CI/CD Files

Work with DevOps team to create Docker-based CI/CD files in the root path. Normally should include following:

```text
|-- lifebyte-laravel-project
    |-- .dockerignore // List of project files ignored when building CI/CD Docker container
    |-- Dockerfile
    |-- Dockerfile-base
    |-- entrypoint.sh
    |-- nginx-default.conf
    |-- nginx-main.conf
    |-- ... // Other project files
```

You can see sample CI/CD files in this project.

## # IDE Settings

### ## PHPStorm

#### ### Laravel Plugins

Before you start working with Laravel, make sure that either of the following plugins are installed and enabled:

- [Laravel Idea](https://laravel-idea.com/docs/install) (paid) plugin.
- [Laravel](https://plugins.jetbrains.com/plugin/7532-laravel/) plugin (free)
  and [Laravel IDE helper](https://github.com/barryvdh/laravel-ide-helper) tool. (See how to
  at [PHPStorm documentation](https://www.jetbrains.com/help/phpstorm/laravel.html))

##### #### Install Laravel Idea plugin (Recommended)

See [Laravel Idea documentation](https://laravel-idea.com/docs/install)

##### #### Install Laravel plugin & Laravel IDE helper (Free)

Install and enable _Laravel_ plugin in **_Settings > Languages & Frameworks > PHP > Laravel_**
Install _Laravel IDE helper_:

```shell
composer require --dev barryvdh/laravel-ide-helper
```

Add _Laravel IDE helper_ as a ServiceProvider into the application. In the `config/app.php` file,
add `Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class` under the `providers` element:

```php
return array(
    //...
    'providers' => array(
         // ...
         // Laravel IDE helper
         'Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class',
    ),
    // ...
);
```

Update composer scripts in `composer.json` to enable automation:

```json lines
// ...
"scripts": {
"post-update-cmd": [
// ...
"@ide-helper"
],
// ...
"ide-helper": [
"@php artisan ide-helper:generate",
"@php artisan ide-helper:meta",
"@php artisan ide-helper:models -N"
]
}
// ...
```

> The Laravel IDE Helper may have to be run (`composer run ide-helper`) after changing or adding services, controllers,
> models and views. 