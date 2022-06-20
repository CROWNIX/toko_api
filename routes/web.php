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
    return $router->app->version();
});


$router->post("/registrasi", ["uses" => "RegistrasiController@registrasi"]);
$router->post("/login", ["uses" => "LoginController@login"]);

$router->group(["prefix" => "produk"], function ($router) {
    $router->post("", ["uses" => "ProdukController@create"]);
    $router->get("/", ["uses" => "ProdukController@list"]);
    $router->get("/{id}", ["uses" => "ProdukController@show"]);
    $router->put("/{id}", ["uses" => "ProdukController@update"]);
    $router->delete("/{id}", ["uses" => "ProdukController@delete"]);
});