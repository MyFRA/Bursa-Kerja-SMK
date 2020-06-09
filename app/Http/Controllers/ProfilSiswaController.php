<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

use Artesaos\SEOTools\Facades\SEOTools;

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
    /**
     * Return a SEO Script.
     *
     */
    public function getSeo()
    {
        // SEO Script
        SEOTools::setTitle('SMK Bisa Kerja | SMK Negeri 1 Bojongsari', false);
        SEOTools::setDescription('Portal lowongan kerja yang disediakan untuk para pencari pekerjaan bagi lulusan SMK/SMA sederajat');
        SEOTools::setCanonical(URL::current());
        SEOTools::metatags()
            ->setKeywords('Lowongan Kerja, Lulusan SMA/SMK, SMK Negeri 1 Bojongsari, Purbalingga, Bursa Kerja, Portal Lowongan Kerja');
        SEOTools::opengraph()
            ->setUrl(URL::current())
            ->addProperty('type', 'homepage');
        SEOTools::twitter()->setSite('@smkbisakerja');
        SEOTools::jsonLd()->addImage(asset('img/logo.png'));
    }
    
    public function index($id) 
    {
        // Mengambil SEO
        $this->getSeo();

        $data = [
            'user' => Auth::user(),
            'nav' => 'lowongan',
            'pelamar' => User::find(decrypt($id)),
            'siswaPendidikan' => SiswaPendidikan::where('siswa_id', User::find(decrypt($id))->siswa->id)->get(),
            'sidebar' => 'lihat-profil'
        ];

        return view('pages.profil-siswa.index', $data);
    }

    public function pendidikan($id)
    {
        // Mengambil SEO
        $this->getSeo();

        $data = [
            'user' => Auth::user(),
            'nav' => 'lowongan',
            'pelamar' => User::where('id', decrypt($id))->first(),
            'sidebar' => 'pendidikan',
            'pendidikan' => SiswaPendidikan::where('siswa_id', User::find(decrypt($id))->siswa->id)->get(),
        ];

        return view('pages.profil-siswa.pendidikan', $data);
    }

    public function pengalaman($id)
    {
        // Mengambil SEO
        $this->getSeo();

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
        // Mengambil SEO
        $this->getSeo();

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
        // Mengambil SEO
        $this->getSeo();

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
        // Mengambil SEO
        $this->getSeo();

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
        // Mengambil SEO
        $this->getSeo();

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
