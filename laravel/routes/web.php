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

// routes om de projecten op te vragen
Route::resource('projects', 'ProjectsController');
Route::post('/projects/{project_id}/inactive', 'ProjectsController@inactive');
Route::post('/projects/{project_id}/active', 'ProjectsController@active');


Route::post('/buy/{reward_id}', 'DonationController@makeDonation')->name('buy');
Route::get('/projects/{project_id}/donations', 'DonationController@showDonationToProject');


Route::get('/news', 'NewspageController@news')->name('news');
Route::get('/news/{news_id}', 'NewspageController@getNews');


Route::get('/profile', 'ProfilepageController@index')->name('profile');


// routes voor project uploader
Route::get('/addProject', 'ProjectUploadController@index')->name('project.add');
Route::post('/addProject', 'ProjectUploadController@store')->name('project.upload');

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
