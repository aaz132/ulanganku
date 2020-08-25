<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

$router->get('/user', 'UserController@getAllUser');
$router->get('/hobbies', 'HobbiesController@getAllHobbies');
$router->get('/user/female', 'UserController@getFemaleUser');
$router->get('/user/male', 'UserController@getMaleUser');
$router->get('/hobbies/point', 'HobbiesController@getPointHobbies');
$router->post('/user/create', 'UserController@createUser');
$router->post('/hobbies/create', 'HobbiesController@createHobbies');
$router->post('/mapuserhobby/create', 'MapUserHobbyController@createMapUserHobby');
// 1 buat route nya dulu
// 2 buat controller
// 3 buat function
$router->get('/map_hobbies', 'HobbiesController@getAllMapHobies');
$router->get('/relation', 'HobbiesController@getHobbies');
