<?php 

Auth::routes();

// Login System Siswa
Route::get('/login', 'Siswa\Auth\LoginController@showLoginForm');
Route::post('/login', 'Siswa\Auth\LoginController@login');
Route::post('/register', 'Siswa\Auth\RegisterController@register')->name('siswa.register');



Route::middleware(['auth', 'role:siswa'])->group(function() {

});


// Profil Siswa
Route::get('/profil', 'Siswa\ProfilControler@index');

Route::middleware(['auth', 'role:siswa'])->group(function() {

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
    Route::resource('/profil/akun', 'Siswa\Profil\AkunController');



    // Buat Resume Sisiwa
    Route::get('/create-resume/siswa-pendidikan', 'Siswa\Resume\SiswaPendidikanController@create');
    Route::post('/create-resume/siswa-pendidikan', 'Siswa\Resume\SiswaPendidikanController@store');
    Route::get('/create-resume/siswa-lainya', 'Siswa\Resume\SiswaLainyaController@create');
    Route::post('/create-resume/siswa-lainya', 'Siswa\Resume\SiswaLainyaController@store');


    // Siswa Melamar Pekerjaan
    Route::post('/lowongan/lamar', 'Siswa\PelamaranController@showProposal');
    Route::post('/lowongan/lamar-sekarang', 'Siswa\PelamaranController@lamarLowongan');

});






// Route::get('/siswa/resume', 'Siswa\ResumeController');
