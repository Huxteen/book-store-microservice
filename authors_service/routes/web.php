<?php

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
    return $router->app->version();
});

$router->get('/authors', 'AuthorController@index');
$router->post('/author/create', 'AuthorController@store');
$router->get('/author/{id}', 'AuthorController@show');
$router->put('/author/{id}', 'AuthorController@update');
$router->patch('/author/{id}', 'AuthorController@update');
$router->delete('/author/{id}', 'AuthorController@destroy');
