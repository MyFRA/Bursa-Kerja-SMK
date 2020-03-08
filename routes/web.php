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

        /** Kompetensi Keahlian Router */
        Route::get('/kompetensi-keahlian/import', 'Admin\KompetensiKeahlianController@import')->name('kompetensi-keahlian.import');
        Route::post('/kompetensi-keahlian/imported', 'Admin\KompetensiKeahlianController@imported')->name('kompetensi-keahlian.imported');
        Route::get('/kompetensi-keahlian/format-excel-import', 'Admin\KompetensiKeahlianController@download')->name('kompetensi-keahlian.download');
        Route::resource('/kompetensi-keahlian', 'Admin\KompetensiKeahlianController')->except(['show']);

        /** Bidang Studi Router */
        Route::get('/bidang-studi/import', 'Admin\BidangStudiController@import')->name('bidang-studi.import');
        Route::post('/bidang-studi/imported', 'Admin\BidangStudiController@imported')->name('bidang-studi.imported');
        Route::get('/bidang-studi/format-excel-import', 'Admin\BidangStudiController@download')->name('bidang-studi.download');
        Route::resource('/bidang-studi', 'Admin\BidangStudiController')->except(['show']);

    });
});
/** /.ADMINISTRATOR */