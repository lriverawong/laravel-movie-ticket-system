# Laravel Docker Setup
Create a basic app with:

    composer create-project laravel/laravel laravel-blog

# Laravel Blog
Create project

    composer create-project laravel/laravel laravel-blog
Inside project, clone laradock

    git clone https://github.com/laradock/laradock.git
Inside laradock, copy env-example as .env

Then modify .env to desired settings.

    cp env-example .env
Go inside Laradock directory and start desired services.

    docker-compose up -d nginx mysql
Enter container

    docker-compose exec workspace bash

Have files created by host's user.

    docker-compose exec --user=laradock workspace bash

Recompiling assets after changing sass vars in app/resources/assets/sass/_variables.scss

    # inside project
    npm run dev

Not having to run npm run dev, but automatically watch for asset changes

    npm run watch

Create controller with basic crud functions

    php artisan make:controller <item>sController --resource

Make model with migrations

    php artisan make:model Post -m

See available routes

    php artisan route:list

Added the following ckeditor:

    https://github.com/UniSharp/laravel-ckeditor

Enable user authentication including all preprovided controllers.

    php artisan make:auth
    
Run migration

    php artisan migrate

Rollback migration

    php artisan migrate:rollback

User url helpers

    href="/custom-page" => href={{route('custom_page_name')}}