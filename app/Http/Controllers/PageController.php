<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

use Artesaos\SEOTools\Facades\SEOTools;

class PageController extends Controller
{
    /**
     * 
    */
    public function privacy_police() {
        SEOTools::setTitle('Kebijakan Privasi - SMK Bisa Kerja | SMK Negeri 1 Bojongsari', false);
        SEOTools::setDescription('Kebijakan Privasi');
        SEOTools::setCanonical(URL::current('/kebijakan-privasi'));
        SEOTools::metatags()
            ->setKeywords('Lowongan Kerja, Lulusan SMA/SMK, SMK Negeri 1 Bojongsari, Purbalingga, Bursa Kerja, Portal Lowongan Kerja');
        SEOTools::opengraph()
            ->setUrl(URL::current())
            ->addProperty('type', 'article');
        SEOTools::twitter()->setSite('@smkbisakerja');
        SEOTools::jsonLd()->addImage(asset('img/logo.png'));

        return view('pages');
    }
}
