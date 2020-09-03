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
Route::group([
    'middleware' => 'userauth:api',
], function ($router) {
    $router->get('/user/all', 'UserController@GetAllUser');
<<<<<<< HEAD
    $router->get('/user/update/{$id}', 'UserController@UpdateUser');
=======
    $router->delete('/user/delete/{id}', 'UserController@delete');
>>>>>>> b24fc291846fa84db176857b55c1c44e4eb8e6e6
});
Route::post('/login', 'UserController@login');
Route::post('/register', 'UserController@create');
