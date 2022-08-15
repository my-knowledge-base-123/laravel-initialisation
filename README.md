# LifeByte Laravel Project Initialisation Guide & Sample

This project gives a step-by-step guidance on how to initialise a LifeByte Laravel project, and shows a sample project
after initialisation.

## # Initialise Git Repository

1. Create a new Git repository with your ***[PROJECT_NAME]***
2. Create *.gitignore* file in the root path via [gitignore.io](https://www.toptal.com/developers/gitignore/), and
   ignore
   followings:
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
2. Initialise Laravel project with project name as "src": `curl -s "https://laravel.build/src" | bash`
3. Upsert following environment variables in *.env* and *.env.example*:
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
9. Write *README.md* in the root path by
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