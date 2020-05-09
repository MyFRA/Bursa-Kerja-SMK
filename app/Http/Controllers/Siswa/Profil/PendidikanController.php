<?php

namespace App\Http\Controllers\Siswa\Profil;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Models\SiswaPendidikan;
use App\Models\BidangKeahlian;
use App\Models\ProgramKeahlian;
use App\Models\KompetensiKeahlian;


class PendidikanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tahunSekarang = getdate();
        for( $i = 1945; $i <= $tahunSekarang['year'] + 10; $i++ ) {
            $tahun[] = $i;
        }

        $data = [
            'nav' => 'pendidikan',
            'bidangKeahlian' => BidangKeahlian::orderBy('nama', 'ASC')->get(),
            'tahun' => $tahun,
            'pendidikan' => SiswaPendidikan::where('siswa_id', Auth::user()->siswa->id)->get()
        ];

        return view('siswa.profil.pendidikan.index', $data);
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
            'nilai_skor'                => 'required|numeric|max:255',
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
            'nilai_skor.max'                    => "nilai skor maksimal 255",
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
                'keterangan' => $request->keterangan
            ]);

            if( $siswaPendidikan ) return redirect('/siswa/profil/pendidikan');
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
        $tahunSekarang = getdate();
        for( $i = 1945; $i <= $tahunSekarang['year'] + 10; $i++ ) {
            $tahun[] = $i;
        }

        $data = [
            'nav' => 'pendidikan',
            'bidangKeahlian' => BidangKeahlian::orderBy('nama', 'ASC')->get(),
            'tahun' => $tahun,
            'pendidikan' => SiswaPendidikan::find(decrypt($id)),
        ];

        return view('siswa.profil.pendidikan.edit', $data);
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
            'nilai_skor'                => 'required|numeric|max:255',
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
            'nilai_skor.max'                    => "nilai skor maksimal 255",
        ]);

        // Jika Validasi Gagal Maka akan dikembalikan ke halaman sebelumnya, ( Insert data Siswa Pendidikan Gagal )
        if ( $validator->fails() ) {
            return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
        // Lolos Validasi
        }else {
            $data = SiswaPendidikan::find(decrypt($id));
            $sql = $data->update([
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
                'keterangan' => $request->keterangan
            ]);

            if( $sql ) return redirect('/siswa/profil/pendidikan');
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
        SiswaPendidikan::destroy(decrypt($id));
        return back();
    }
}
