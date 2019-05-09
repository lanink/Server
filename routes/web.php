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

$router->get('/list', 'ApiController@list');

$router->get('/book/{bookId:[\d]}' , 'ApiController@book');

$router->get('/chapter/{chapterId:[\d]}' , 'ApiController@chapter');

$router->get('/run' , 'TaskController@run');
