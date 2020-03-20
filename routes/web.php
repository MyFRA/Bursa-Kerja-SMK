<?php

Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
Route::get('/lowongan', 'JobController@index')->name('lowongan');
Route::get('/lowongan/{link}', 'JobController@show')->name('lowongan.show');
Route::get('/faq', 'FaqController@index')->name('faq');
Route::get('/produk-siswa', 'ProductController@index');
Route::get('/produk-siswa/{link}', 'ProductController@show');
Route::get('/artikel', 'ArtikelController@index')->name('artikel');
Route::get('/artikel/{link}', 'ArtikelController@show')->name('artikel.show');
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

        /** Artikel Router */ 
        Route::resource('/artikel', 'Admin\ArtikelController')->except(['show']);

        /**  Master File */
            /** Kompetensi Keahlian Router */
            Route::get('/kompetensi-keahlian/import', 'Admin\KompetensiKeahlianController@import')->name('kompetensi-keahlian.import');
            Route::post('/kompetensi-keahlian/imported', 'Admin\KompetensiKeahlianController@imported')->name('kompetensi-keahlian.imported');
            Route::get('/kompetensi-keahlian/format-excel-import', 'Admin\KompetensiKeahlianController@download')->name('kompetensi-keahlian.download');
            Route::resource('/kompetensi-keahlian', 'Admin\KompetensiKeahlianController')->except(['show']);

            /** Bidang Keahlian Router */
            Route::get('/bidang-keahlian/import', 'Admin\BidangKeahlianController@import')->name('bidang-keahlian.import');
            Route::post('/bidang-keahlian/imported', 'Admin\BidangKeahlianController@imported')->name('bidang-keahlian.imported');
            Route::get('/bidang-keahlian/format-excel-import', 'Admin\BidangKeahlianController@download')->name('bidang-keahlian.download');
            Route::resource('/bidang-keahlian', 'Admin\BidangKeahlianController')->except(['show']);

            /** Program Keahlian Router */
            Route::get('/program-keahlian/import', 'Admin\ProgramKeahlianController@import')->name('program-keahlian.import');
            Route::post('/program-keahlian/imported', 'Admin\ProgramKeahlianController@imported')->name('program-keahlian.imported');
            Route::get('/program-keahlian/format-excel-import', 'Admin\ProgramKeahlianController@download')->name('program-keahlian.download');
            Route::resource('/program-keahlian', 'Admin\ProgramKeahlianController')->except(['show']);

            /** Bahasa Router */
            Route::get('/bahasa/import', 'Admin\BahasaController@import')->name('bahasa.import');
            Route::post('/bahasa/imported', 'Admin\BahasaController@imported')->name('bahasa.imported');
            Route::get('/bahasa/format-excel-import', 'Admin\BahasaController@download')->name('bahasa.download');
            Route::resource('/bahasa', 'Admin\BahasaController')->except(['show']);

            /** Keterampilan Router */
            Route::get('/keterampilan/import', 'Admin\KeterampilanController@import')->name('keterampilan.import');
            Route::post('/keterampilan/imported', 'Admin\KeterampilanController@imported')->name('keterampilan.imported');
            Route::get('/keterampilan/format-excel-import', 'Admin\KeterampilanController@download')->name('keterampilan.download');
            Route::resource('/keterampilan', 'Admin\KeterampilanController')->except(['show']);

            /** Negara Router */
            Route::get('/negara/import', 'Admin\NegaraController@import')->name('negara.import');
            Route::post('/negara/imported', 'Admin\NegaraController@imported')->name('negara.imported');
            Route::get('/negara/format-excel-import', 'Admin\NegaraController@download')->name('negara.download');
            Route::resource('/negara', 'Admin\NegaraController')->except(['show']);

            /** Mata Uang Router */
            Route::get('/mata-uang/import', 'Admin\MataUangController@import')->name('mata-uang.import');
            Route::post('/mata-uang/imported', 'Admin\MataUangController@imported')->name('mata-uang.imported');
            Route::get('/mata-uang/format-excel-import', 'Admin\MataUangController@download')->name('mata-uang.download');
            Route::resource('/mata-uang', 'Admin\MataUangController')->except(['show']);

            /** Provinsi Router */
            Route::get('/provinsi/import', 'Admin\ProvinsiController@import')->name('provinsi.import');
            Route::post('/provinsi/imported', 'Admin\ProvinsiController@imported')->name('provinsi.imported');
            Route::get('/provinsi/format-excel-import', 'Admin\ProvinsiController@download')->name('provinsi.download');
            Route::resource('/provinsi', 'Admin\ProvinsiController')->except(['show']);

            /** Kabupaten Router */
            Route::get('/kabupaten/import', 'Admin\KabupatenController@import')->name('kabupaten.import');
            Route::post('/kabupaten/imported', 'Admin\KabupatenController@imported')->name('kabupaten.imported');
            Route::get('/kabupaten/format-excel-import', 'Admin\KabupatenController@download')->name('kabupaten.download');
            Route::resource('/kabupaten', 'Admin\KabupatenController')->except(['show']);

        /** Akhir Master File */

        /** Pengaturan Router */
        Route::resource('/pengaturan', 'Admin\PengaturanController');

        /** Faq Router */
        Route::get('/faq/import', 'Admin\FaqController@import')->name('faq.import');
        Route::post('/faq/imported', 'Admin\FaqController@imported')->name('faq.imported');
        Route::get('/faq/format-excel-import', 'Admin\FaqController@download')->name('faq.download');
        Route::resource('/faq', 'Admin\FaqController');

        /** Halaman Router */
        Route::resource('/halaman', 'Admin\HalamanController');

        /** Agenda Router */
        Route::resource('/agenda', 'Admin\AgendaController');


    });
});
/** /.ADMINISTRATOR */