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



$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('locations', 'Api\LocationController@index');
    $router->get('locations/{id}', 'Api\LocationController@show');
    $router->post('locations', 'Api\LocationController@create');
    $router->delete('locations/{id}', 'Api\LocationController@delete');
    $router->get('locations/{id}', 'Api\LocationController@delete');
});
