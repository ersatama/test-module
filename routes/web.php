<?php


Auth::routes(['verify' => true]);

Route::group(['middleware' => ['auth']], function() {
    Route::get('/user/id','HomeController@userId');
    Route::get('/','HomeController@home');
    Route::get('/home','HomeController@home');
    Route::get('/all','HomeController@all');
    Route::post('/audio/save/{item}/{id}','HomeController@saveAudio');
    Route::post('/module/comment','HomeController@newComment');
});

Route::get('logout', 'Auth\LoginController@logout');


