<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

use Artesaos\SEOTools\Facades\SEOTools;

use App\Models\Perusahaan;
use App\Models\Lowongan;

class PerusahaanController extends Controller
{
    public function getSeo($title)
    {
        // SEO Script
        SEOTools::setTitle($title . ' - SMK Bisa Kerja | SMK Negeri 1 Bojongsari', false);
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

    public function register()
    {   
        $this->getSeo('Daftar Perusahaan');

    	return view('pages.perusahaan.register');
    }

    public function show($id)
    {
        $perusahaan = Perusahaan::find(decrypt($id));
        $this->getSeo($perusahaan->nama);

        $data = [
            'user'       => Auth::user(),
            'perusahaan' => $perusahaan,
            'jmlLowongan' => Lowongan::where('perusahaan_id', decrypt($id))
                                    ->count(),
            'navLink' => 'perusahaan'
        ];  

        return view('pages.portal-perusahaan.show', $data);
    }
}
