<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;

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

$router->post('/resetpassword', ['middleware' => 'auth', 'uses' => 'UserController@ResetPassword']);

$router->post('/forgotpassword', 'UserController@ForgotPassword');
$router->post('/login', 'UserController@Login');
$router->post('/register', 'UserController@Register');
$router->post('/auth', ['middleware' => 'auth', 'uses' => 'UserController@Auth']);
$router->get('/users', 'UserController@GetAllUsers');


$router->post('/miscellaneous/delete', ['middleware' => 'admin', 'uses' => 'MiscellaneousController@Delete']);
$router->post('/miscellaneous/update', ['middleware' => 'admin', 'uses' => 'MiscellaneousController@Update']);
$router->get('/miscellaneous/get', 'MiscellaneousController@Get');
$router->post('/miscellaneous/create', ['middleware' => 'admin', 'uses' => 'MiscellaneousController@Create']);


$router->post('/property/create', ['middleware' => 'auth', 'uses' => 'PropertyController@Create']);
$router->post('/property/update', ['middleware' => 'auth', 'uses' => 'PropertyController@Update']);
$router->post('/property/delete', ['middleware' => 'auth', 'uses' => 'PropertyController@Delete']);


$router->post('/amenities/update', ['middleware' => 'admin', 'uses' => 'AmenitiesController@Update']);
$router->post('/amenities/delete', ['middleware' => 'admin', 'uses' => 'AmenitiesController@Delete']);
$router->post('/amenities/create', ['middleware' => 'admin', 'uses' => 'AmenitiesController@Create']);
$router->get('/amenities/get', 'AmenitiesController@Get');


$router->get('/kitchenplan/get', 'KitchenPlanController@Get');
$router->post('/kitchenplan/create', ['middleware' => 'admin', 'uses' => 'KitchenPlanController@Create']);
$router->post('/kitchenplan/update', ['middleware' => 'admin', 'uses' => 'KitchenPlanController@Update']);
$router->post('/kitchenplan/delete', ['middleware' => 'admin', 'uses' => 'KitchenPlanController@Delete']);


$router->get('/bathroomplan/get', 'BathroomPlanController@Get');
$router->post('/bathroomplan/create', ['middleware' => 'admin', 'uses' => 'BathroomPlanController@Create']);
$router->post('/bathroomplan/update', ['middleware' => 'admin', 'uses' => 'BathroomPlanController@Update']);
$router->post('/bathroomplan/detele', ['middleware' => 'admin', 'uses' => 'BathroomPlanController@Detele']);

$router->get('/buildingplan/get', 'BuildingPlanController@Get');
$router->post('/buildingplan/create', ['middleware' => 'admin', 'uses' => 'BuildingPlanController@Create']);
$router->post('/buildingplan/update', ['middleware' => 'admin', 'uses' => 'BuildingPlanController@Update']);
$router->post('/buildingplan/delete', ['middleware' => 'admin', 'uses' => 'BuildingPlanController@Delete']);


$router->get('/globaltile/get', 'GlobaltileController@Get');
$router->post('/globaltile/create', ['middleware' => 'admin', 'uses' => 'GlobaltileController@Create']);
$router->post('/globaltile/update', ['middleware' => 'admin', 'uses' => 'GlobaltileController@Update']);
$router->post('/globaltile/delete', ['middleware' => 'admin', 'uses' => 'GlobaltileController@Delete']);

$router->get('/floorplan/get', 'FloorPlanController@Get');
$router->post('/floorplan/create', ['middleware' => 'admin', 'uses' => 'FloorPlanController@Create']);
$router->post('/floorplan/update', ['middleware' => 'admin', 'uses' => 'FloorPlanController@Update']);
$router->post('/floorplan/delete', ['middleware' => 'admin', 'uses' => 'FloorPlanController@Delete']);


$router->post('/changerole',  ['middleware' => 'superadmin', 'uses' => 'UserController@ChangeRole']);

$router->post('/uploadimg', function (Request $request) {
    $file = $request->file('img');

    if ($file) {
        $filename = $file->move((__DIR__ . '/../public/images/'), str_replace('%20', '', $file->getClientOriginalName()));
        return response(['filename' => basename($filename)]);
    }
    return response(['message' => 'file not found'], 404);
});
