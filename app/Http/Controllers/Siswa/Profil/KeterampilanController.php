<?php

namespace App\Http\Controllers\Siswa\Profil;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\URL;

use Artesaos\SEOTools\Facades\SEOTools;


use App\Models\SiswaKeterampilan;

class KeterampilanController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->getSeo();

        $data = [
            'nav' => 'keterampilan',
            'keterampilan' => SiswaKeterampilan::where('siswa_id', Auth::user()->siswa->id)->get()
        ];

        return view('siswa.profil.keterampilan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi Form Input
        $validator = Validator::make($request->all(), [
            'keterangan'            => 'required|max:32',
            'tingkat'               => 'required|in:Pemula,Menengah,Tingkat Lanjut',
        ], [
            'keterangan.required'   => "keterampilan tidak boleh kosong",
            'keterangan.max'        => "keterampilan maksimal 32 karakter",
            'tingkat.required'      => 'tingkat tidak boleh kosong',
            'tingkat.in'            => 'tingkat tidak cocok',
        ]);

        // Jika Validasi Gagal Maka akan dikembalikan ke halaman sebelumnya, ( Insert data Siswa Pendidikan Gagal )
        if ( $validator->fails() ) {
            return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
        // Lolos Validasi
        }else {
            $sql = SiswaKeterampilan::create([
                'siswa_id' => Auth::user()->siswa->id,
                'keterangan' => $request->keterangan,
                'tingkat' => $request->tingkat
            ]);

            if( $sql ) return back();

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->getSeo();

        $data = [
            'nav' => 'keterampilan',
            'keterampilan' => SiswaKeterampilan::find(decrypt($id)),
        ];

        return view('siswa.profil.keterampilan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validasi Form Input
        $validator = Validator::make($request->all(), [
            'keterangan'            => 'required|max:32',
            'tingkat'               => 'required|in:Pemula,Menengah,Tingkat Lanjut',
        ], [
            'keterangan.required'   => "keterampilan tidak boleh kosong",
            'keterangan.max'        => "keterampilan maksimal 32 karakter",
            'tingkat.required'      => 'tingkat tidak boleh kosong',
            'tingkat.in'            => 'tingkat tidak cocok',
        ]);

        // Jika Validasi Gagal Maka akan dikembalikan ke halaman sebelumnya, ( Insert data Siswa Pendidikan Gagal )
        if ( $validator->fails() ) {
            return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
        // Lolos Validasi
        }else {
            $data = SiswaKeterampilan::find(decrypt($id));
            $sql = $data->update([
                'siswa_id' => Auth::user()->siswa->id,
                'keterangan' => $request->keterangan,
                'tingkat' => $request->tingkat
            ]);

            if( $sql ) return redirect('/siswa/profil/keterampilan');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sql = SiswaKeterampilan::destroy(decrypt($id));

        if($sql) return back();
    }
}
