# Laravel Task Manager API
This is a laravel 5.4 API that adds task management functionality to web applications.

## Installation

git clone https://github.com/gndlovu/laravel-api.git
cd laravel-api

You'll then need to run `composer install` or `composer update` to download it and have the autoloader updated.

## Configuration

Provide database credentials in .env file

You need to run migrations to create tasks table

```bash
php artisan migrate"
```

Then you are ready to get running. Just visit 

```bash
http://{{site-url}}/api/v1/tasks
```

The front-end to test this API can be found at (https://github.com/gndlovu/ng2-laravel)
