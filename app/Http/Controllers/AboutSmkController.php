<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

use Artesaos\SEOTools\Facades\SEOTools;

use App\Models\Halaman;

class AboutSmkController extends Controller
{
        /**
     * Return a SEO Script.
     *
     */
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


    public function halaman($link)
    {
        $halaman= Halaman::where('link', $link)->first();
        $this->getSeo('Disklaimer');

        $data = [
            'navLink' => '',
            'halaman' => $halaman,
        ];

        return view('about-smk.halaman', $data);
    }

    // public function aboutUs()
    // {
    //     $this->getSeo('Apa Itu SBK');

    //     $data = [
    //         'navLink' => ''
    //     ];

    //     return view('about-smk.about-us', $data);
    // }

    // public function hubungiKami()
    // {
    //     $this->getSeo('Hubungi Kami');

    //     $data = [
    //         'navLink' => ''
    //     ];

    //     return view('about-smk.hubungi-kami', $data);
    // }

    // public function kebijakanPrivasi()
    // {
    //     $this->getSeo('Kebijakan Privasi');

    //     $data = [
    //         'navLink' => ''
    //     ];

    //     return view('about-smk.kebijakan-privasi', $data);
    // }

    // public function syaratKetentuan()
    // {
    //     $this->getSeo('Syarat Ketentuan');

    //     $data = [
    //         'navLink' => ''
    //     ];

    //     return view('about-smk.syarat-ketentuan', $data);
    // }

    // public function disklaimer()
    // {
    //     $this->getSeo('Disklaimer');

    //     $data = [
    //         'navLink' => ''
    //     ];

    //     return view('about-smk.disklaimer', $data);
    // }
}
