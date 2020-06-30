<?php

namespace App\Http\Controllers\Siswa\Resume;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\URL;
use Artesaos\SEOTools\Facades\SEOTools;

use App\Models\KompetensiKeahlian;
use App\Models\ProgramKeahlian;
use App\Models\SiswaPendidikan;
use App\Models\BidangKeahlian;
use App\User;

class SiswaPendidikanController extends Controller
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
        SEOTools::setTitle('Resume Siswa Pendidikan - SMK Bisa Kerja | SMK Negeri 1 Bojongsari', false);
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
            $tahunSekarang = getdate();
            for( $i = $tahunSekarang['year']; $i >= 1945; $i-- ) {
                $tahun[] = $i;
            }

            $data = [
                'bidangKeahlian' => BidangKeahlian::get(),
                'programKeahlian' => ProgramKeahlian::get(),
                'kompetensiKeahlian' => KompetensiKeahlian::get(),
                'tahun' => $tahun,
                'navLink' => '',
            ];
    
            return view('siswa/resume/siswa-pendidikan', $data);
        } else {
            return redirect('/siswa/create-resume/siswa-lainya');
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
            if(is_null(BidangKeahlian::find($request->bidang_keahlian_id))) return back();
            if(is_null(ProgramKeahlian::find($request->program_keahlian_id))) return back();
            if(is_null(KompetensiKeahlian::find($request->kompetensi_keahlian_id))) return back();

            // Validasi Form Input
            $validator = Validator::make($request->all(), [
                'bidang_keahlian_id'        => 'required',
                'program_keahlian_id'       => 'required',
                'kompetensi_keahlian_id'    => 'required',
                'nama_sekolah'              => 'required|max:64',
                'tahun_lulus'               => 'required|numeric|digits:4',
                'bulan_lulus'               => 'required|max:255',
                'tingkat_sekolah'           => 'required|in:SD,SMP/MTS,SMK/SMA/MA,S1,S2,S3',
                'nilai_akhir'               => 'required|in:IPK,NEM,Tidak Tamat,Masih Belajar',
                'nilai_skor'                => 'required|numeric|max:100',
            ], [
                'bidang_keahlian_id.required'       => "bidang keahlian id tidak boleh kosong",
                'program_keahlian_id.required'      => "program keahlian id tidak boleh kosong",
                'kompetensi_keahlian_id.required'   => "kompetensi keahlian id tidak boleh kosong",
                'nama_sekolah.required'             => "nama sekolah tidak boleh kosong",
                'nama_sekolah.max'                  => "nama sekolah maksimal 64 karakter",
                'tahun_lulus.required'              => 'tahun lulus tidak boleh kosong',
                'tahun_lulus.digits'                => 'tahun lulus harus 4 digit',
                'tahun_lulus.numeric'               => 'tahun lulus harus angka',
                'bulan_lulus.required'              => 'bulan lulus tidak boleh kosong',
                'bulan_lulus.max'                   => 'bulan lulus maksimal 255 karakter',
                'tingkat_sekolah.required'          => 'tingkat sekolah tidak boleh kosong',
                'tingkat_sekolah.in'                => 'nilai tingkat sekolah tidak cocok',
                'nilai_akhir.required'              => 'nilai akhir tidak boleh kosong',
                'nilai_akhir.in'                    => 'nilai akhir tidak cocok',
                'nilai_skor.required'               => "nilai skor tidak boleh kosong",
                'nilai_skor.numeric'                => "nilai skor harus angka",
                'nilai_skor.max'                    => "nilai skor tidak valid",
            ]);

            // Jika Validasi Gagal Maka akan dikembalikan ke halaman sebelumnya, ( Insert data Siswa Pendidikan Gagal )
            if ( $validator->fails() ) {
                return redirect()->back()
                                ->withErrors($validator)
                                ->withInput();
            // Lolos Validasi
            }else {
                $siswaPendidikan = SiswaPendidikan::create([
                    'siswa_id' => Auth::user()->siswa->id,
                    'bidang_keahlian_id' => $request->bidang_keahlian_id,
                    'program_keahlian_id' => $request->program_keahlian_id,
                    'kompetensi_keahlian_id' => $request->kompetensi_keahlian_id,
                    'nama_sekolah' => $request->nama_sekolah,
                    'tahun_lulus' => $request->tahun_lulus,
                    'bulan_lulus' => $request->bulan_lulus,
                    'tingkat_sekolah' => $request->tingkat_sekolah,
                    'nilai_akhir' => $request->nilai_akhir,
                    'nilai_skor' => $request->nilai_skor,
                ]);

                if( $siswaPendidikan ) return redirect('/siswa/create-resume/siswa-lainya');
            }

        } else {
            return redirect('/siswa/create-resume/siswa-lainya');
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
