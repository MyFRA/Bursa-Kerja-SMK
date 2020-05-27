<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Models\SiswaPendidikan;
use App\Models\SiswaPengalaman;
use App\Models\SiswaKeterampilan;
use App\Models\Negara;
use App\Models\MataUang;
use App\Models\BidangKeahlian;
use App\Models\Bahasa;
use App\Models\SiswaBahasa;
use App\Models\Siswa;
use App\Models\SiswaLainya;



class ProfilSiswaController extends Controller
{
    
    public function index($id) 
    {
        $data = [
            'user' => Auth::user(),
            'nav' => 'lowongan',
            'pelamar' => User::where('id', decrypt($id))->first(),
            'sidebar' => 'lihat-profil'
        ];
        return view('pages.profil-siswa.index', $data);
    }

    public function pendidikan($id)
    {
        $data = [
            'user' => Auth::user(),
            'nav' => 'lowongan',
            'pelamar' => User::where('id', decrypt($id))->first(),
            'sidebar' => 'pendidikan',
            'pendidikan' => SiswaPendidikan::where('siswa_id', User::find(decrypt($id))->siswa->id)->get()
        ];

        return view('pages.profil-siswa.pendidikan', $data);
    }

    public function pengalaman($id)
    {
        $data = [
            'user' => Auth::user(),
            'nav' => 'lowongan',
            'pelamar' => User::where('id', decrypt($id))->first(),
            'pengalaman' => SiswaPengalaman::where('siswa_id', User::find(decrypt($id))->siswa->id)->orderBy('created_at', 'DESC')->get(),
            'sidebar' => 'pengalaman'
        ];

        return view('pages.profil-siswa.pengalaman', $data);
    }

    public function keterampilan($id)
    {
        $data = [
            'user' => Auth::user(),
            'nav' => 'lowongan',
            'pelamar' => User::where('id', decrypt($id))->first(),
            'sidebar' => 'keterampilan',
            'keterampilan' => SiswaKeterampilan::where('siswa_id', User::find(decrypt($id))->siswa->id)->get()
        ];

        return view('pages.profil-siswa.keterampilan', $data);
    }

    public function bahasa($id)
    {
        $data = [
            'user' => Auth::user(),
            'nav' => 'lowongan',
            'pelamar' => User::where('id', decrypt($id))->first(),
            'sidebar' => 'bahasa',
            'siswaBahasa' => SiswaBahasa::where('siswa_id', User::find(decrypt($id))->siswa->id)->get(),
        ];

        return view('pages.profil-siswa.bahasa', $data);
    }

    public function lainya($id)
    {
        $data = [
            'user' => Auth::user(),
            'nav' => 'lowongan',
            'pelamar' => User::where('id', decrypt($id))->first(),
            'sidebar' => 'lainya',
            'siswaLainya' => SiswaLainya::where('siswa_id', User::find(decrypt($id))->siswa->id)->first()
        ];

        return view('pages.profil-siswa.lainya', $data);
    }

    public function profilLengkap($id)
    {
        $data = [
            'user' => Auth::user(),
            'nav' => 'lowongan',
            'pelamar' => User::where('id', decrypt($id))->first(),
            'sidebar' => 'profil-saya',
            'siswa' => Siswa::find(User::find(decrypt($id))->siswa->id)
        ];

        return view('pages.profil-siswa.profil-lengkap', $data);
    }
}
