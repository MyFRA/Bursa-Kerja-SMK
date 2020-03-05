<?php

Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
Route::get('/lowongan', 'JobController@index')->name('jobs');
Route::get('/kebijakan-privasi', 'PageController@privacy_police')->name('privacy-police');

/** ADMINISTRATOR */
Route::prefix('/app-admin')->group(function() {

    Route::get('/', function() {
        return redirect('/app-admin/login');
    });

    Route::get('/login', 'Admin\LoginController@index')->name('admin-login');
    Route::post('/login', 'Admin\LoginController@login')->name('admin-login.post');

    Route::middleware(['auth'])->group(function() {
        Route::get('/dashboard', 'Admin\AdminController@index')->name('admin');

        /** Jurusan Router */
        Route::get('/jurusan/import', 'Admin\JurusanController@import')->name('jurusan.import');
        Route::post('/jurusan/imported', 'Admin\JurusanController@imported')->name('jurusan.imported');
        Route::get('/jurusan/format-excel-import', 'Admin\JurusanController@download')->name('jurusan.download');
        Route::resource('/jurusan', 'Admin\JurusanController')->except(['show']);
        /** Bidang Studi Router */
        
    });
});
/** /.ADMINISTRATOR */