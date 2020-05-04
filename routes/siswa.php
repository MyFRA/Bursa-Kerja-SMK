<?php 

Auth::routes();

// Login System Perusahaan
Route::get('/login', 'Perusahaan\Auth\LoginController@showLoginForm')->name('perusahaan.login-form');
Route::post('/login', 'Perusahaan\Auth\LoginController@login');
Route::post('/register', 'Siswa\Auth\RegisterController@register')->name('siswa.register');






// Route::get('/siswa/resume', 'Siswa\ResumeController');
