<?php 

	Auth::routes();

	// Login System Perusahaan
	Route::get('/login', 'Perusahaan\Auth\LoginController@showLoginForm')->name('perusahaan.login-form');
	Route::post('/login', 'Perusahaan\Auth\LoginController@login');
	Route::get('/register', 'Perusahaan\Auth\RegisterController@showRegistrationForm');
	Route::post('/register', 'Perusahaan\Auth\RegisterController@register')->name('perusahaan.register');
	

	Route::middleware(['auth_perusahaan', 'role:perusahaan'])->group(function() {


		// Halaman Bebas Akses ( Tanpa Permission )
		Route::get('/', 'Perusahaan\BerandaController@index');
		Route::post('/logout', 'Perusahaan\BerandaController@logout');


		// Melakukan Verifikasi ( Permission melakukan verifikasi )
		Route::middleware(['permission:melakukan verifikasi'])->group(function() {
		   	Route::get('/verifikasi', 'Perusahaan\BerandaController@showVerifikasiForm');
			Route::post('/verifikasi', 'Perusahaan\BerandaController@verifikasi'); 
		});


		// Halaman Profil ( permission 'menunggu verifikasi diterima' )
		Route::middleware(['permission:menunggu verifikasi diterima|terverifikasi'])->group(function() {
			Route::get('/profil', 'Perusahaan\ProfilController@index');
			Route::get('/profil/ubah', 'Perusahaan\ProfilController@ubah');
			Route::put('/profil/update', 'Perusahaan\ProfilController@update');
		});














	});













	Route::get('/profil', 'Perusahaan\ProfilController@index');