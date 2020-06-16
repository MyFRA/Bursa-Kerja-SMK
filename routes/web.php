<?php

Auth::routes();
Route::get('/login', function() {
    return redirect('/siswa/login');
})->name('login');
Route::get('/', 'HomeController@index')->name('home');
Route::get('/lowongan', 'JobController@index')->name('lowongan');
Route::get('/lowongan/{link}', 'JobController@show')->name('lowongan.show');
Route::get('/lowongan/cari/pekerjaan', 'JobController@indexByConditionCari');
Route::get('/lowongan/cari/pekerjaan/urut-berdasarkan/{metode}', 'JobController@indexByUrutBerdasarkan');
Route::get('/faq', 'FaqController@index')->name('faq');
Route::get('/produk-siswa', 'ProductController@index');
Route::get('/produk-siswa/{link}', 'ProductController@show');
Route::get('/artikel', 'ArtikelController@index')->name('artikel');
Route::get('/artikel/{link}', 'ArtikelController@show')->name('artikel.show');
Route::get('/kebijakan-privasi', 'PageController@privacy_police')->name('privacy-police');
Route::get('/perusahaan/show/{id}', 'PerusahaanController@show');
Route::get('/portal/perusahaan', 'PortalController@index');
Route::get('/agenda', 'AgendaController@index');
Route::get('/agenda/{link}', 'AgendaController@show');
Route::get('/pengumuman', 'PengumumanController@index');
Route::get('/pengumuman/{link}', 'PengumumanController@show');

// Ajax Controller
Route::get('/getProgramKeahlian/{id}', 'AjaxController@getProgramKeahlian');
Route::get('/getKompetensiKeahlian/{id}', 'AjaxController@getKompetensiKeahlian');
Route::get('/getProvinsi/{nama_negara}', 'AjaxController@getProvinsi');
Route::get('/getKabupaten/{nama_provinsi}', 'AjaxController@getKabupaten');
Route::get('/apiProvinsi', 'AjaxController@apiProvinsi');


Route::middleware(['auth_perusahaan', 'role:perusahaan'])->group(function() {
    // Profil Siswa
    Route::get('/profil-siswa/{id}/{idLowongan}', 'ProfilSiswaController@index');
    Route::get('/profil-siswa/{id}/{idLowongan}/pendidikan', 'ProfilSiswaController@pendidikan');
    Route::get('/profil-siswa/{id}/{idLowongan}/pengalaman', 'ProfilSiswaController@pengalaman');
    Route::get('/profil-siswa/{id}/{idLowongan}/keterampilan', 'ProfilSiswaController@keterampilan');
    Route::get('/profil-siswa/{id}/{idLowongan}/bahasa', 'ProfilSiswaController@bahasa');
    Route::get('/profil-siswa/{id}/{idLowongan}/lainya', 'ProfilSiswaController@lainya');
    Route::get('/profil-siswa/{id}/{idLowongan}/profil-lengkap', 'ProfilSiswaController@profilLengkap');
});




/** ADMINISTRATOR */
Route::prefix('/app-admin')->group(function() {

    Route::get('/', function() {
        return redirect('/app-admin/login');
    });

    Route::get('/login', 'Admin\LoginController@index')->name('admin-login');
    Route::post('/login', 'Admin\LoginController@login')->name('admin-login.post');

    Route::middleware(['auth', 'role:superadmin|guru'])->group(function() {
        Route::get('/dashboard', 'Admin\AdminController@index')->name('admin');

        /** Artikel Router */
        Route::resource('/artikel', 'Admin\ArtikelController')->except(['show']);
        Route::delete('/artikel/hapus/semua-artikel', 'Admin\ArtikelController@hapusMassal');

        /**  Master File */
            /** Kompetensi Keahlian Router */
            Route::get('/kompetensi-keahlian/import', 'Admin\KompetensiKeahlianController@import')->name('kompetensi-keahlian.import');
            Route::post('/kompetensi-keahlian/imported', 'Admin\KompetensiKeahlianController@imported')->name('kompetensi-keahlian.imported');
            Route::get('/kompetensi-keahlian/format-excel-import', 'Admin\KompetensiKeahlianController@download')->name('kompetensi-keahlian.download');
            Route::resource('/kompetensi-keahlian', 'Admin\KompetensiKeahlianController')->except(['show']);
            Route::delete('/kompetensi-keahlian/hapus/semua-kompetensi-keahlian', 'Admin\KompetensiKeahlianController@hapusMassal');

            /** Bidang Keahlian Router */
            Route::get('/bidang-keahlian/import', 'Admin\BidangKeahlianController@import')->name('bidang-keahlian.import');
            Route::post('/bidang-keahlian/imported', 'Admin\BidangKeahlianController@imported')->name('bidang-keahlian.imported');
            Route::get('/bidang-keahlian/format-excel-import', 'Admin\BidangKeahlianController@download')->name('bidang-keahlian.download');
            Route::resource('/bidang-keahlian', 'Admin\BidangKeahlianController')->except(['show']);
            Route::delete('/bidang-keahlian/hapus/semua-bidang-keahlian', 'Admin\BidangKeahlianController@hapusMassal');

            /** Program Keahlian Router */
            Route::get('/program-keahlian/import', 'Admin\ProgramKeahlianController@import')->name('program-keahlian.import');
            Route::post('/program-keahlian/imported', 'Admin\ProgramKeahlianController@imported')->name('program-keahlian.imported');
            Route::get('/program-keahlian/format-excel-import', 'Admin\ProgramKeahlianController@download')->name('program-keahlian.download');
            Route::resource('/program-keahlian', 'Admin\ProgramKeahlianController')->except(['show']);
            Route::delete('/program-keahlian/hapus/semua-program-keahlian', 'Admin\ProgramKeahlianController@hapusMassal');

            /** Bahasa Router */
            Route::get('/bahasa/import', 'Admin\BahasaController@import')->name('bahasa.import');
            Route::post('/bahasa/imported', 'Admin\BahasaController@imported')->name('bahasa.imported');
            Route::get('/bahasa/format-excel-import', 'Admin\BahasaController@download')->name('bahasa.download');
            Route::resource('/bahasa', 'Admin\BahasaController')->except(['show']);
            Route::delete('/bahasa/hapus/semua-bahasa', 'Admin\BahasaController@hapusMassal');

            /** Keterampilan Router */
            Route::get('/keterampilan/import', 'Admin\KeterampilanController@import')->name('keterampilan.import');
            Route::post('/keterampilan/imported', 'Admin\KeterampilanController@imported')->name('keterampilan.imported');
            Route::get('/keterampilan/format-excel-import', 'Admin\KeterampilanController@download')->name('keterampilan.download');
            Route::resource('/keterampilan', 'Admin\KeterampilanController')->except(['show']);
            Route::delete('/keterampilan/hapus/semua-keterampilan', 'Admin\KeterampilanController@hapusMassal');

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
            Route::delete('/mata-uang/hapus/semua-mata-uang', 'Admin\MataUangController@hapusMassal');

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

            /** Pengumuman Router */
            Route::get('/pengumuman/import', 'Admin\PengumumanController@import')->name('pengumuman.import');
            Route::post('/pengumuman/imported', 'Admin\PengumumanController@imported')->name('pengumuman.imported');
            Route::get('/pengumuman/format-excel-import', 'Admin\PengumumanController@download')->name('pengumuman.download');
            Route::delete('/pengumuman/hapus/semua-pengumuman', 'Admin\PengumumanController@hapusMassal');
            Route::resource('/pengumuman', 'Admin\PengumumanController')->except(['show']);

        /** Akhir Master File */

        /** Pengaturan Router */
        Route::resource('/pengaturan', 'Admin\PengaturanController')->except(['create', 'store', 'show', 'destroy']);

        /** Faq Router */
        Route::get('/faq/import', 'Admin\FaqController@import')->name('faq.import');
        Route::post('/faq/imported', 'Admin\FaqController@imported')->name('faq.imported');
        Route::get('/faq/format-excel-import', 'Admin\FaqController@download')->name('faq.download');
        Route::resource('/faq', 'Admin\FaqController');
        Route::delete('/faq/hapus/semua-faq', 'Admin\FaqController@hapusMassal');

        /** Halaman Router */
        Route::resource('/halaman', 'Admin\HalamanController')->except(['show']);
        Route::delete('/halaman/hapus/semua-halaman', 'Admin\HalamanController@hapusMassal');

        /** Agenda Router */
        Route::resource('/agenda', 'Admin\AgendaController');
        Route::delete('/agenda/hapus/semua-agenda', 'Admin\AgendaController@hapusMassal');

        /** Daftar Siswa Router */
        Route::resource('/daftar-siswa', 'Admin\SiswaController')->except(['show']);
        Route::delete('/siswa/hapus/semua-siswa', 'Admin\SiswaController@hapusMassal');

        // Daftar Perusahaan Router
        Route::resource('/daftar-perusahaan', 'Admin\PerusahaanController');
        Route::get('/daftar-perusahaan/ajax/{id}', 'Admin\PerusahaanController@ajax');
        Route::delete('/perusahaan/hapus/semua-perusahaan', 'Admin\PerusahaanController@hapusMassal');

        // Lowongan Kerja Router
        Route::resource('/lowongan-kerja', 'Admin\LowonganController')->except(['show']);
        Route::delete('/lowongan/hapus/semua-lowongan', 'Admin\LowonganController@hapusMassal');

        // Dafar Pengguna Router
        Route::resource('/daftar-pengguna', 'Admin\DaftarPenggunaController');

        // Verifikasi Perusahaan
        Route::get('/perusahaan/menunggu-verifikasi', 'Admin\VerifikasiPerusahaanController@menungguVerifikasi');
        Route::post('/perusahaan/terima-verifikasi/{id}', 'Admin\VerifikasiPerusahaanController@terimaVerifikasi');
        Route::post('/perusahaan/tolak-verifikasi/{id}', 'Admin\VerifikasiPerusahaanController@tolakVerifikasi');
        Route::get('/perusahaan/lihat/{id}', 'Admin\VerifikasiPerusahaanController@lihat');
        Route::get('/perusahaan/terverifikasi', 'Admin\VerifikasiPerusahaanController@terverifikasi');
    });
});
