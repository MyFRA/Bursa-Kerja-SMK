<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

use Artesaos\SEOTools\Facades\SEOTools;

use App\Models\Pengumuman;
use App\Models\Artikel;

class PengumumanController extends Controller
{
    public function index()
    {
        SEOTools::setTitle('SMK Bisa Kerja | SMK Negeri 1 Bojongsari', false);
        SEOTools::setDescription('Portal lowongan kerja yang disedikana untuk para penacari pekerjaan bagi lulusan SMK/SMA sederajat');
        SEOTools::setCanonical(URL::current());
        SEOTools::metatags()
            ->setKeywords('Lowongan Kerja, Lulusan SMA/SMK, SMK Negeri 1 Bojongsari, Purbalingga, Bursa Kerja, Portal Lowongan Kerja');
        SEOTools::opengraph()
            ->setUrl(URL::current())
            ->addProperty('type', 'homepage');
        SEOTools::twitter()->setSite('@smkbisakerja');
        SEOTools::jsonLd()->addImage(asset('img/logo.png'));

        $data = [
            'navLink' => 'pengumuman',
            'items' => Pengumuman::where('status', 'aktif')->orderBy('created_at', 'DESC')->paginate(5),
            'artikelPopuler' => Artikel::where('status', 'Aktif')->orderBy('counter', 'DESC')->limit(4)->get()
        ];

        return view('pengumuman', $data);
    }

    public function show($link)
    {
        SEOTools::setTitle('SMK Bisa Kerja | SMK Negeri 1 Bojongsari', false);
        SEOTools::setDescription('Portal lowongan kerja yang disedikana untuk para penacari pekerjaan bagi lulusan SMK/SMA sederajat');
        SEOTools::setCanonical(URL::current());
        SEOTools::metatags()
            ->setKeywords('Lowongan Kerja, Lulusan SMA/SMK, SMK Negeri 1 Bojongsari, Purbalingga, Bursa Kerja, Portal Lowongan Kerja');
        SEOTools::opengraph()
            ->setUrl(URL::current())
            ->addProperty('type', 'homepage');
        SEOTools::twitter()->setSite('@smkbisakerja');
        SEOTools::jsonLd()->addImage(asset('img/logo.png'));
        
        $data = [
            'navLink' => 'pengumuman',
            'pengumuman' => Pengumuman::where('link', $link)->first(),
            'artikelPopuler' => Artikel::where('status', 'Aktif')->orderBy('counter', 'DESC')->limit(4)->get(),
            'pengumumanTerbaru' => Pengumuman::orderBy('created_at', 'DESC')->limit(3)->get(),
        ];

        return view('pengumuman-show', $data);
    }
}
