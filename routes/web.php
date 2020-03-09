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
//    return view('main');
    return view('welcome');
});

Route::prefix('services')->group(function () {

    Route::get('cargo', function () {
        return view('services.cargo.cargo');
    });

    Route::get('avia', function () {
        return view('services.avia.avia');
    });

    Route::get('project', function () {
        return view('services.project.project');
    });

    Route::get('storage', function () {
        return view('services.storage.storage');
    });

    Route::get('express', function () {
        return view('services.express.express');
    });

    Route::get('russia', function () {
        return view('services.russia.russia');
    });

});

Route::get('/services', function () {
    return view('services.services');
});

Route::get('/contacts', function () {
    return view('contacts.contacts');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function() {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/instruction', 'HomeController@instruction')->name('instruction');
    Route::get('/profile', 'HomeController@profile')->name('profile');
    Route::post('/profile', 'HomeController@changePassword');
});

Route::get('logout', 'Auth\LoginController@logout');


