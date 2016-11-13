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

$app->get('/', function () use ($app) {
  return $app->welcome();
});
$app->get('/students', 'StudentsController@index');

$app->get('/students/{id:[\d]+}', 'StudentsController@show');
$app->post('/students', 'StudentsController@store');
$app->put('/students/{id:[\d]+}', 'StudentsController@update');
$app->delete('/students/{id:[\d]+}', 'StudentsController@destroy');


$app->get('/papers', 'PapersController@index');
$app->get('/papers/{id:[\d]+}', 'PapersController@show');
$app->get('/papers/list/{id:[\d]+}', 'PapersController@list'); //get a list of papers with a studentid
$app->post('/papers', 'PapersController@store');
$app->put('/papers/{id:[\d]+}', 'PapersController@update');
$app->delete('/papers/{id:[\d]+}', 'PapersController@destroy');
