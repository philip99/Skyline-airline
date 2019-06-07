<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/About', function () {
    return view('child');
});


Route::get('/flight/search', 'FlightController@searchFlightByDate')->name("searchFlightByDate");


Route::get('city/{city}', 'FlightController@SearchPerCity');

Route::get('flight/{id}', 'FlightController@getAllInfo');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('profile');

Route::post('user/updateUser', 'UserController@updateUserData')->name('updateUser');

Route::get('/flights', 'FlightController@getAllFlights');

Route::post('/book', 'FlightController@bookFlight');



Route::get('/book', function () {
    echo "You need to be logged in";
});





//Route::get('/user/{id}', 'UserController@getUser');
//Route::get('/home', 'UserController@updateEmail');


//Start reviews routes
Route::get('reviews/edit/{id}', 'ReviewController@editReviewPage')->name('EditReviewPage');
Route::post('reviews/edit/action/{id}', 'ReviewController@editReview')->name('EditReview'); 
Route::get('reviews/delete/{id}', 'ReviewController@DeleteReview')->name('DeleteReview');
Route::get('reviews', 'ReviewController@showAllReviews')->name('AllReviews');
Route::post('/review/add', 'ReviewController@addReiew')->name('AddReview');
//End reviews routes




//Start User routes
Route::get('/user/profile/{id}', 'UserController@ShowUserPerId')->name("show_user");
Route::get('/user/showAll', 'UserController@ShowAllUsers')->name("showAllUsers");
Route::get('/uploadfile', 'UploadFileController@index');
Route::post('uploadfile', 'UploadFileController@upload')->name('uploadfile');
Route::get('/user/makeAdmin/{id}', 'UserController@MakeUserAdmin')->name("MakeUserAdmin");
Route::get('/user/delete/{id}', 'UserController@DeleteUserPerId')->name("DeleteUerPerId");
Route::get('/user/deleteUser', 'UserController@deleteUserData')->name('deleteUser');
Route::get('user/{id}', 'UserController@show');
//End User routes


Route::post('/flight/book', 'FlightController@ticketReservation')->name("bookFlight");


Route::post('/ticket', function () {
    return view('ticket');
});



Route::get('/export_excel/excel', 'ExportExcelController@excel')->name('export');


//Start social login routes

// Route::get('/login/{social}','Auth\LoginController@socialLogin')
//         ->where('social','twitter|facebook|linkedin|google|github');
// Route::get('/login/{social}/callback','Auth\LoginController@handleProviderCallback')
//         ->where('social','twitter|facebook|linkedin|google|github');

Route::get('/login/google','Auth\LoginController@socialLogin');
Route::get('/login/google/callback','Auth\LoginController@handleProviderCallback');

//Eind social login routes