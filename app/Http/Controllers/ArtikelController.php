<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

use Artesaos\SEOTools\Facades\SEOTools;

use App\Models\Artikel;

class ArtikelController extends Controller
{
    /**
     * Show the application artikel.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
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
            'navLink' => 'artikel',
            'items' => Artikel::where('status', 'Aktif')->orderBy('created_at', 'DESC')->paginate(6),
            'artikelPopuler' => Artikel::where('status', 'Aktif')->orderBy('counter', 'DESC')->limit(4)->get()
        ];

        return view('artikel', $data);
    }

    /**
     * Show the application artikel show.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
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

        $randomArtikel = (Artikel::where('status', 'Aktif')->count() >= 3) ? Artikel::where('status', 'Aktif')->get()->random(3) : Artikel::where('status', 'Aktif')->get();

        $article = Artikel::where('link', $link)->first();
        $newCounter = $article->counter + 1;
        $article->update([
            'counter' => $newCounter,
        ]);

        // Pengubahan tags menjadi arrray
        $tags = explode(';', $article->tags);
        // menghapus index array terakhir
        unset($tags[count($tags) - 1]);

        $data = [
            'navLink' => 'artikel',
            'artikel' => $article,
            'tags' => $tags,
            'randomArtikel' => $randomArtikel,
            'artikelPopuler' => Artikel::where('status', 'Aktif')->orderBy('counter', 'DESC')->limit(4)->get()
        ];

        return view('artikel-show', $data);
    }
}
