<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;

use Artesaos\SEOTools\Facades\SEOTools;

use App\Models\Lowongan;
use App\Models\Pelamaran;

class JobController extends Controller
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

    /**
     * Show the application job list.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Mengambil SEO
        $this->getSeo();

        $data = [
            'lowongan' => Lowongan::where('status', 'aktif')
                                    ->orderBy('created_at', 'DESC')
                                    ->paginate(6)
        ];

        return view('pages.jobs.index', $data);
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Mengambil SEO
        $this->getSeo();

        if(Auth::check()) {
            (Auth::user()->hasRole('siswa')) ?  $siswaId = Auth::user()->siswa->id : $siswaId = false;
        } else {
            $siswaId = false;
        }

        $data = [
            'lowongan' => Lowongan::find(decrypt($id)),
            'melamar' => Pelamaran::where('siswa_id', $siswaId)
                                    ->where('lowongan_id', decrypt($id))->first()
        ];

        return view('pages.jobs.show', $data);
    }
}
