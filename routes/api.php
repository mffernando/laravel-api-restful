<?php

use Illuminate\Http\Request;

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

Route::post('register', 'Auth\RegisterController@register'); //register
Route::post('login', 'Auth\LoginController@login'); //login
Route::post('logout', 'Auth\LoginController@logout'); //logout

//unauthenticated
Route::group(['middleware' => 'auth:api'], function() {
  Route::get('users', 'UserController@index'); //all
  Route::get('users/{user}', 'UserController@show'); //show
  Route::post('users', 'UserController@create'); // create
  Route::put('users/{user}', 'UserController@update'); // update
  Route::delete('users/{user}', 'UserController@delete'); //delete
});
