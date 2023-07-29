<?php

/** @var \Laravel\Lumen\Routing\Router $router */


$router->get('/api/cars', "CarsController@readAll");

$router->group(['prefix' =>'/api/cars'], function () use ($router) {
    $router->post("/", "CarsController@create");
    $router->get("/{id}", "CarsController@read");
    $router->put("/{id}", "CarsController@update");
    $router->delete("/{id}", "CarsController@delete");
});
