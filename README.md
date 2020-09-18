# Color scheme storage

This application can manage color schemes.

## Design process
For both the backend and the frontend I was thinking about programming it all on myself or relying on already 
programmed frameworks and libraries.

My final decision was to use **Lumen** - a lightweight version of the Laravel framework - in combination with a
vuejs frontend. The main reason for this is that I am already familiar with this stack and therefore the development is
really fast.

The backend is using a SQLite database. This is not recommended for a bigger productive environment, but for this demo
application it should be enough. (If I would have programmed everything on my own, I probably would have gone for
simple JSON or CSV files) Thanks to Lumen it can be easily changed to some of the most common SQL-Databases.

As the structure is rather simple I decided not to draw an ERD. But you can find the structure of the database tables
in the `database/migrations` folder.

## Description of the API
The API is generally following the [REST](https://www.restapitutorial.com/) standard.

There are currently 3 routes for listing, saving and deleting the colors. You will find a list of the routes in the
`routes/web.php` file.

## Requirements
The application needs the following software to be run:
* PHP
* Composer
* Node.js
* NPM

## Frontend
For the frontend vuejs is used.

To run it cd into the frontend folder and install all the packages with `npm install`

You can start a development server with `npm run serve`

## Backend
For the backend Lumen (a smaller Version of Laravel) is used.

To run it first install all the composer dependencies with `composer install`

Create a `.env` file with the needed variables. The easiest way is by copying the `.env.example` file and name it `.env`

Depending on your operating system you maybe need to adjust the path to the database in the `.env` file.

You can start the development server by running `php -S localhost:8080 -t public`

## Testing
There are some API-tests for the backend in the `tests` directory. They can be run with **phpunit**.

The frontend is currently not covered by automated tests.

## Links
Documentation for [Lumen framework](https://lumen.laravel.com/docs)
Documentation for [Vue.js](https://vuejs.org/v2/guide/)

