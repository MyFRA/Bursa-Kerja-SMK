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
        Route::get('/bidang-studi/import', 'Admin\BidangStudiController@import')->name('bidang-studi.import');
        Route::post('/bidang-studi/imported', 'Admin\BidangStudiController@imported')->name('bidang-studi.imported');
        Route::get('/bidang-studi/format-excel-import', 'Admin\BidangStudiController@download')->name('bidang-studi.download');
        Route::resource('/bidang-studi', 'Admin\BidangStudiController')->except(['show']);

        /** Bidang Pekerjaan Router */
        Route::get('/bidang-pekerjaan/import', 'Admin\BidangPekerjaanController@import')->name('bidang-pekerjaan.import');
        Route::post('/bidang-pekerjaan/imported', 'Admin\BidangPekerjaanController@imported')->name('bidang-pekerjaan.imported');
        Route::get('/bidang-pekerjaan/format-excel-import', 'Admin\BidangPekerjaanController@download')->name('bidang-pekerjaan.download');
        Route::resource('/bidang-pekerjaan', 'Admin\BidangPekerjaanController')->except(['show']);

        /** Bidang Pekerjaan Router */
        Route::get('/bidang-industri/import', 'Admin\BidangIndustriController@import')->name('bidang-industri.import');
        Route::post('/bidang-industri/imported', 'Admin\BidangIndustriController@imported')->name('bidang-industri.imported');
        Route::get('/bidang-industri/format-excel-import', 'Admin\BidangIndustriController@download')->name('bidang-industri.download');
        Route::resource('/bidang-industri', 'Admin\BidangIndustriController')->except(['show']);

        /** Daftar Keahlian Router */
        Route::get('/daftar-keahlian/import', 'Admin\DaftarKeahlianController@import')->name('daftar-keahlian.import');
        Route::post('/daftar-keahlian/imported', 'Admin\DaftarKeahlianController@imported')->name('daftar-keahlian.imported');
        Route::get('/daftar-keahlian/format-excel-import', 'Admin\DaftarKeahlianController@download')->name('daftar-keahlian.download');
        Route::resource('/daftar-keahlian', 'Admin\DaftarKeahlianController')->except(['show']);

    });
});
/** /.ADMINISTRATOR */