<?php

Auth::routes();

// Login System Siswa
Route::get('/login', 'Siswa\Auth\LoginController@showLoginForm')->name('siswa.login');
Route::post('/login', 'Siswa\Auth\LoginController@login');
Route::post('/register', 'Siswa\Auth\RegisterController@register')->name('siswa.register');

Route::middleware(['auth_siswa'])->group(function() {
    // Melihat siapa saja pelamar
    Route::get('/lowongan/lihat/pelamar/{id}', 'Siswa\PelamaranController@lihatPelamar');
});

Route::middleware(['auth_siswa', 'role:siswa'])->group(function() {

    // Beranda Siswa
    Route::get('/beranda', 'Siswa\BerandaController@index');

    // Profil Siswa
    Route::get('/profil', 'Siswa\Profil\ProfilController@index');
    Route::resource('/profil/pengalaman', 'Siswa\Profil\PengalamanController');
    Route::resource('/profil/pendidikan', 'Siswa\Profil\PendidikanController');
    Route::resource('/profil/keterampilan', 'Siswa\Profil\KeterampilanController');
    Route::resource('/profil/bahasa', 'Siswa\Profil\BahasaController');
    Route::resource('/profil/lainya', 'Siswa\Profil\LainyaController');
    Route::resource('/profil/profil-saya', 'Siswa\Profil\ProfilSayaController');
    Route::resource('/profil/akun', 'Siswa\Profil\AkunController')->only(['index']);

    // Edit Username
    Route::get('/profil/akun/username/{id}/edit', 'Siswa\Profil\AkunController@usernameEdit');
    Route::put('/profil/akun/username/{id}', 'Siswa\Profil\AkunController@usernameUpdate');
    Route::get('/profil/akun/password/{id}/edit', 'Siswa\Profil\AkunController@passwordEdit');
    Route::put('/profil/akun/password/{id}', 'Siswa\Profil\AkunController@passwordUpdate');

    // Buat Resume Sisiwa
    Route::get('/create-resume/siswa-pendidikan', 'Siswa\Resume\SiswaPendidikanController@create');
    Route::post('/create-resume/siswa-pendidikan', 'Siswa\Resume\SiswaPendidikanController@store');
    Route::get('/create-resume/siswa-lainya', 'Siswa\Resume\SiswaLainyaController@create');
    Route::post('/create-resume/siswa-lainya', 'Siswa\Resume\SiswaLainyaController@store');

    // Siswa Melamar Pekerjaan
    Route::post('/lowongan/lamar', 'Siswa\PelamaranController@showProposal');
    Route::post('/lowongan/lamar-sekarang', 'Siswa\PelamaranController@lamarLowongan');

    Route::resource('/lamaran', 'Siswa\LamaranController');
    Route::get('/lamaran/status/lamaran', 'Siswa\LamaranController@indexByStatus');
    Route::get('/lamaran/{idPelamaran}/pesan', 'Siswa\LamaranController@lihatPesan');
});
