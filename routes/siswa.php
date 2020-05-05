<?php 

Auth::routes();

// Login System Siswa
Route::get('/login', 'Perusahaan\Auth\LoginController@showLoginForm')->name('perusahaan.login-form');
Route::post('/login', 'Perusahaan\Auth\LoginController@login');
Route::post('/register', 'Siswa\Auth\RegisterController@register')->name('siswa.register');


// Profil Siswa
Route::get('/profil', 'Siswa\ProfilControler@index');


// Buat Resume Sisiwa
Route::get('/create-resume/siswa-pendidikan', 'Siswa\Resume\SiswaPendidikanController@create');
Route::post('/create-resume/siswa-pendidikan', 'Siswa\Resume\SiswaPendidikanController@store');




// Route::get('/siswa/resume', 'Siswa\ResumeController');
