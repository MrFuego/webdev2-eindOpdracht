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

// route naar de index pagina
Route::get('/', 'HomepageController@home')->name('index');
Route::get('/about', 'PagesController@about')->name('about');
Route::get('/contact', 'PagesController@contact')->name('contact');
Route::get('/privacy', 'PagesController@privacy')->name('privacy');
Route::get('project/{project_id}', 'ProjectsController@show')->name('showProject');


Route::get('/profile', function () {
    return view('pages/profile');
})->name('profile');


// routes voor project uploader
Route::get('/addProject', 'ProjectUploadController@index')->name('project.add');
Route::post('/addProject', 'ProjectUploadController@store')->name('projectUpload');


// route om een testmail te sturen
Route::get('/sendtestmail', 'MailTestController@sendMail');

// routes voor de authentificatie
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

// Payment routes
Route::get('/stripe', 'PaymentController@getStripeForm');
Route::post('/stripe', 'PaymentController@postStripePayment')->name('stripe.post');



// API routes
Route::post('/api/convert', 'APIController@postConvert')->name('api.convert');
