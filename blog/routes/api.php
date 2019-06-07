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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['prefix'=>'auth'], function(){
    Route::post('register', 'ApiController@register');
    Route::post('login', 'ApiController@login');
    Route::group(['middleware'=>'auth:api'], function(){
        Route::get('logout', 'ApiController@logout');
        Route::get('profile', 'ApiController@profile');
    });
});

Route::group(['prefix'=>'user'], function(){   
    Route::group(['middleware'=>'auth:api'], function(){
        Route::put('update/{id}', 'UserApiController@update');
        Route::put('changePassword/{id}', 'UserApiController@changePassord');
        Route::get('getAll', 'UserApiController@getAllUsers');
        Route::delete('delete/{id}', 'UserApiController@deleteUser');
    });
});
