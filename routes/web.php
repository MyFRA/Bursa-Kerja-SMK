<?php

Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
Route::get('/lowongan', 'JobController@index')->name('jobs');
Route::get('/kebijakan-privasi', 'PageController@privacy_police')->name('privacy-police');