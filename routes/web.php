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
        Route::get('/bidang-keahlian/import', 'Admin\BidangKeahlianController@import')->name('bidang-keahlian.import');
        Route::post('/bidang-keahlian/imported', 'Admin\BidangKeahlianController@imported')->name('bidang-keahlian.imported');
        Route::get('/bidang-keahlian/format-excel-import', 'Admin\BidangKeahlianController@download')->name('bidang-keahlian.download');
        Route::resource('/bidang-keahlian', 'Admin\BidangKeahlianController')->except(['show']);

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

        /** Mata Uang Router */
        Route::get('/mata-uang/import', 'Admin\MataUangController@import')->name('mata-uang.import');
        Route::post('/mata-uang/imported', 'Admin\MataUangController@imported')->name('mata-uang.imported');
        Route::get('/mata-uang/format-excel-import', 'Admin\MataUangController@download')->name('mata-uang.download');
        Route::resource('/mata-uang', 'Admin\MataUangController')->except(['show']);

    });
});
/** /.ADMINISTRATOR */