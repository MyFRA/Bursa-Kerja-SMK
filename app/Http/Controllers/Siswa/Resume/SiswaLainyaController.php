<?php

namespace App\Http\Controllers\Siswa\Resume;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\URL;
use Artesaos\SEOTools\Facades\SEOTools;

use App\Models\Keterampilan;
use App\Models\Provinsi;
use App\Models\SiswaLainya;
use App\User;


class SiswaLainyaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // SEO Script
        SEOTools::setTitle('Resume Siswa Lainya - SMK Bisa Kerja | SMK Negeri 1 Bojongsari', false);
        SEOTools::setDescription('Portal lowongan kerja yang disediakan untuk para pencari pekerjaan bagi lulusan SMK/SMA sederajat');
        SEOTools::setCanonical(URL::current());
        SEOTools::metatags()
            ->setKeywords('Lowongan Kerja, Lulusan SMA/SMK, SMK Negeri 1 Bojongsari, Purbalingga, Bursa Kerja, Portal Lowongan Kerja');
        SEOTools::opengraph()
            ->setUrl(URL::current())
            ->addProperty('type', 'homepage');
        SEOTools::twitter()->setSite('@smkbisakerja');
        SEOTools::jsonLd()->addImage(asset('img/logo.png'));

        if( is_null(Auth::user()->siswa->siswaPendidikan) ) {
            return redirect('/siswa/create-resume/siswa-pendidikan');

        } elseif(!is_null(Auth::user()->siswa->siswaLainya)) {
            return redirect('/siswa/beranda');
        } else {
            $data = [
                'keterampilan' => Keterampilan::orderBy('nama', 'ASC')->get(),
                'provinsi' => Provinsi::orderBy('nama_provinsi', 'ASC')->get(),
                'navLink' => '',
            ];
    
            return view('siswa/resume/siswa-lainya', $data);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if( is_null(Auth::user()->siswa->siswaPendidikan) ) {
            return redirect('/siswa/create-resume/siswa-pendidikan');
        } elseif(!is_null(Auth::user()->siswa->siswaLainya)) {
            return redirect('/siswa/beranda');
        } else {
            if(is_null(Keterampilan::find($request->keterampilan_id))) return back();

            // Pengubahan Gaji Menjadi Full Angka
            $gaji_diharapkan = explode('Rp. ', $request->gaji_diharapkan);
            $gaji_diharapkan = end($gaji_diharapkan);
            $gaji_diharapkan = explode('.', $gaji_diharapkan);
            $gaji_diharapkan = join('', $gaji_diharapkan);

            // Validasi Form Input
            $validator = Validator::make($request->all(), [
                'keterampilan_id'        => 'required',
            ], [
                'keterampilan_id.required'  => "keterampilan id tidak boleh kosong",
            ]);

            // Jika Validasi Gagal Maka akan dikembalikan ke halaman sebelumnya, ( Insert data Siswa Pendidikan Gagal )
            if ( $validator->fails() ) {
                return redirect()->back()
                                ->withErrors($validator)
                                ->withInput();
            // Lolos Validasi
            }else {
                $siswaLainya = SiswaLainya::create([
                    'siswa_id' => Auth::user()->siswa->id,
                    'keterampilan_id' => $request->keterampilan_id,
                    'gaji_diharapkan' => $gaji_diharapkan,
                    'lokasi_diharap' => json_encode($request->lokasi_diharap) ,
                    'keterangan' => $request->keterangan
                ]);

                if( $siswaLainya ) return redirect('/siswa/beranda');
                return back();
            }
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
