<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use Illuminate\Http\Request;

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


$router->post('/forgotpassword', 'UserController@ForgotPassword');
$router->post('/login', 'UserController@Login');
$router->post('/register', 'UserController@Register');
$router->post('/auth', ['middleware' => 'auth', 'uses' => 'UserController@Auth']);
$router->post('/property/create', ['middleware' => 'auth', 'uses' => 'PropertyController@Create']);
$router->post('/amenities/create', ['middleware' => 'admin', 'uses' => 'AmenitiesController@Create']);
$router->post('/changerole',  ['middleware' => 'superadmin', 'uses' => 'UserController@ChangeRole']);
$router->post('/uploadimg', function (Request $request) {
    $file = $request->file('img');

    if ($file) {
        return  $file->move(storage_path('\images'), $file->getClientOriginalName());
    }
    return response(['message' => 'file not found'], 404);
});
