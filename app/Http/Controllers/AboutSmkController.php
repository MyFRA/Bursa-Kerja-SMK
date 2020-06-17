<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

use Artesaos\SEOTools\Facades\SEOTools;

class AboutSmkController extends Controller
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


    public function aboutUs()
    {
        $this->getSeo();

        $data = [
            'navLink' => ''
        ];

        return view('about-smk.about-us', $data);
    }

    public function hubungiKami()
    {
        $this->getSeo();

        $data = [
            'navLink' => ''
        ];

        return view('about-smk.hubungi-kami', $data);
    }

    public function kebijakanPrivasi()
    {
        $this->getSeo();

        $data = [
            'navLink' => ''
        ];

        return view('about-smk.kebijakan-privasi', $data);
    }

    public function syaratKetentuan()
    {
        $this->getSeo();

        $data = [
            'navLink' => ''
        ];

        return view('about-smk.syarat-ketentuan', $data);
    }

    public function disklaimer()
    {
        $this->getSeo();

        $data = [
            'navLink' => ''
        ];

        return view('about-smk.disklaimer', $data);
    }
}
