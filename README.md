# On terminal, navigate into \bidvest-assessment folder.
cd .\bidvest-assessment\  

## update all dependencies
npm install

## or install all dependencies
npm ci

## Install PHP dependencies
composer install

## Setup configuration
cp .env.example .env

## Generate application key
php artisan key:generate

## Create an SQLite database (or any desired database) and configure
touch database/database.sqlite or manually create the file

## publish all schemas to the database
php artisan migrate

## run database seeder
php artisan db:seed

## start project
php artisan serve 
use link provided e.g (Server running on [http://127.0.0.1:8000])

## start development server (on different terminal)
npm run dev


## The link below is for a video doing a short demostration of how the application works.
https://www.loom.com/share/c2d99486bdae4cffabcc13b2334add1b?sid=ea9744e4-3e90-493f-9e05-f7edef36a38e

## Git repo link

(HTTPS) https://github.com/obakengmanana/bidvest-tool-management-app
(SSH) git@github.com:obakengmanana/bidvest-tool-management-app.git

## Spec or functionality

Use Laravel, Vue, Tailwind, SQLite and Inertia.

Tables categories (name, description), and tools (name, description, category),

Do CRUD for both tables.

Index pages should have pagination.
