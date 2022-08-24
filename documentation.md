# Laravel Sample

This project gives a step-by-step guidance on how to initialise a LifeByte Laravel project, and shows a sample project
after initialisation.

## # Technology Stack

- Laravel: v9.x
- PHP: 8.1
- Docker: Laravel Sail

## # Installation

1. Clone the project to your local device
2. Go to path `/src` in the project

    ```shell
    cd path/to/project/src
    ```
   
3. Create `.env` file

   ```shell
   cp .env.example .env
   ```
   
4. Set environment variables in `.env`
   
5. Install dependencies

   ```shell
   composer install
   ```
   
6. Build Docker container & start a Bash session in the container

   ```shell
   ./vendor/bin/sail up -d && ./vendor/bin/sail shell
   ```
   
7. Re-install dependencies in the container CLI

   ```shell
   composer install
   ```
   
8. Generate application key

   ```shell
   php artisan key:generate
   ```
   
9. Run database migration and seeding

   ```shell
   php artisan migrate --seed
   ```
   
10. Open application in browser or test APIs with Postman

### ## API Status Codes

| **Code** | **Description**           |
|----------|---------------------------|
| 10001    | The given data is invalid |
| ...      | ...                       |
