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
    $router->post('locations/{id}/places', 'Api\PlaceController@update');
    $router->delete('locations/{id}', 'Api\LocationController@delete');

    $router->get('locations/{id}/places', 'Api\PlaceController@index');
    $router->post('locations/{id}/places', 'Api\PlaceController@indeshowx');
    $router->put('places/{id}', 'Api\PlaceController@update');
    

    return $router;
});
