<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return 'Please have a look at the readme.md file to find out how to use this project';
});

/*
 * Routes for managing a color
 */
$router->get('/colors', 'ColorController@index');
$router->post('/colors', 'ColorController@store');
$router->delete('/colors/{colorId}', 'ColorController@destroy');
