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

//API_BASE: http://localhost:8000/

$router->get('/', function () use ($router) {
    return $router->app->version();
});
/**
 * @var \Laravel\Lumen\Routing\Router $router
 * Endpoint: http://localhost:8081/api/employees/
 */
$router->group(['prefix' => 'api/employees', 'namespace' => 'Employee'], function () use ($router) {
    $router->get('/', 'EmployeeController@findAll');
    $router->get('/{id}', 'EmployeeController@find');
    $router->post('/', 'EmployeeController@create');
    $router->put('/{id}', 'EmployeeController@update');
    $router->delete('/{id}', 'EmployeeController@delete');
});

/**
 * @var \Laravel\Lumen\Routing\Router $router
 * Endpoint: http://localhost:8000/api/students/
 */
$router->group(['prefix' => 'api/students', 'namespace' => 'Students'], function () use ($router) {
    $router->get('/', 'StudentController@findAll');
    $router->get('/{id}', 'StudentController@find');
    $router->post('/', 'StudentController@create');
    $router->put('/{id}', 'StudentController@update');
    $router->delete('/{id}', 'StudentController@delete');
});

/**
 * @var \Laravel\Lumen\Routing\Router $router
 * Endpoint: http://localhost:8000/api/classes/
 */
$router->group(['prefix' => 'api/classes', 'namespace' => 'Classes'], function () use ($router) {
    $router->get('/', 'ClassesController@findAll');
    $router->get('/{id}', 'ClassesController@find');
    $router->get('/{employee}', 'ClassesController@findByEmployee');
    $router->post('/', 'ClassesController@create');
    $router->put('/{id}', 'ClassesController@update');
    $router->delete('/{id}', 'ClassesController@delete');
});
