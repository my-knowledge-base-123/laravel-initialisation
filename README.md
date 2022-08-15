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
        |-- // Laravel project files
    |-- .gitignore
    |-- README.md
    |-- ver.txt // Version tag file
    |-- // Files for CI/CD
```

1. Go to the project root path
2. Initialise Laravel project with project name as "src": `curl -s "https://laravel.build/src" | bash`
3. Upsert following environment variables in *.env* and *.env.example*:
   ```dotenv
    APP_NAME=[YOUR_PROJECT_NAME]
    APP_URL=http://localhost

    DB_HOST=mysql
    DB_USERNAME=root
    DB_PASSWORD=

    MEMCACHED_HOST=memcached

    REDIS_HOST=redis

    COMPOSE_PROJECT_NAME=[DOCKER_CONTAINER_NAME]
   ```
4. Start application with: `cd src && ./vendor/bin/sail up -d`. (It is recommended to add a zsh/bash alias `sail` to replace `./vendor/bin/sail`)
5. Now you can build something incredible! For more development guide: see [Development Standards - Laravel](https://github.com/lifebyte-systems/lifebyte-web-development-standards/blob/main/laravel/development-standards.md)