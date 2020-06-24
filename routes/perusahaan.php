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

            // Setelan Akun
            Route::get('/profil/setelan-akun', 'Perusahaan\SetelanAkunController@index');

            // Edit Username
            Route::get('/profil/setelan-akun/username/{id}/edit', 'Perusahaan\SetelanAkunController@usernameEdit');
            Route::put('/profil/setelan-akun/username/{id}', 'Perusahaan\SetelanAkunController@usernameUpdate');

            // Edit Username
            Route::get('/profil/setelan-akun/password/{id}/edit', 'Perusahaan\SetelanAkunController@passwordEdit');
            Route::put('/profil/setelan-akun/password/{id}', 'Perusahaan\SetelanAkunController@passwordUpdate');
        });

		// Halaman Lowongan Pekerjaan Perusahaan
		Route::middleware(['permission:terverifikasi'])->group(function() {
			Route::resource('/lowongan', 'Perusahaan\LowonganController')->except(['show']);
			Route::get('/lowongan/status', 'Perusahaan\LowonganController@status');
			Route::get('/lowongan/{lowonganId}/pelamar', 'Perusahaan\PelamarController@index');
			Route::get('/lowongan/{lowonganId}/pelamar/status', 'Perusahaan\PelamarController@showAllByStatus');
			Route::get('/lowongan/show/pelamar/{siswaId}', 'Perusahaan\PelamarController@showPelamarById');
			Route::get('/lowongan/status-pelamaran/', 'Perusahaan\PelamarController@showStatusPelamaran');
			Route::put('/lowongan/status-pelamaran/{idStatusPelamaran}', 'Perusahaan\PelamarController@updateStatusPelamaran');
			Route::get('/lowongan/status-pelamaran/{idStatusPelamaran}/edit', 'Perusahaan\PelamarController@editStatusPelamaran');
		});
	});
