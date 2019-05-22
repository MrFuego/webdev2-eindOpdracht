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

// routes voor image uploader
Route::get('/addProject', 'ProjectUploadController@index');
Route::post('/addProject', 'ProjectUploadController@store')->name('projectUpload');

Route::get('/', function () {
    return view('welcome');
})->name('index');

Route::get('/sendtestmail', 'MailTestController@sendMail', function () {

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Payment routes
Route::get('/stripe', 'PaymentController@getStripeForm');
Route::post('/stripe', 'PaymentController@postStripePayment')->name('stripe.post');

// API routes
Route::post('/api/convert', 'APIController@postConvert')->name('api.convert');
