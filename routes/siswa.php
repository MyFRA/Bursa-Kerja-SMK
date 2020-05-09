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


    // Buat Resume Sisiwa
    Route::get('/create-resume/siswa-pendidikan', 'Siswa\Resume\SiswaPendidikanController@create');
    Route::post('/create-resume/siswa-pendidikan', 'Siswa\Resume\SiswaPendidikanController@store');
    Route::get('/create-resume/siswa-lainya', 'Siswa\Resume\SiswaLainyaController@create');
    Route::post('/create-resume/siswa-lainya', 'Siswa\Resume\SiswaLainyaController@store');
});






// Route::get('/siswa/resume', 'Siswa\ResumeController');
