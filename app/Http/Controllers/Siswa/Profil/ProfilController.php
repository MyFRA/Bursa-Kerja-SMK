<?php

namespace App\Http\Controllers\Siswa\Profil;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Models\BidangKeahlian;
use App\Models\ProgramKeahlian;
use App\Models\KompetensiKeahlian;
use App\Models\SiswaPengalaman;
use App\Models\SiswaPendidikan;
use App\Models\Negara;
use App\Models\MataUang;


class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'user' => Auth::user(),
            'nav' => 'lihat-profil',
            'siswaPendidikan' => SiswaPendidikan::where('siswa_id', Auth::user()->siswa->id)->get()
        ];
        return view('siswa.profil.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storePengalaman(Request $request)
    {
        if(is_null(BidangKeahlian::find($request->bidang_keahlian_id))) return back();
        if(is_null(ProgramKeahlian::find($request->program_keahlian_id))) return back();
        if(is_null(KompetensiKeahlian::find($request->kompetensi_keahlian_id))) return back();

        // Pengubahan Gaji Menjadi Full Angka
        $gaji_bulanan = explode('Rp. ', $request->gaji_bulanan);
        $gaji_bulanan = end($gaji_bulanan);
        $gaji_bulanan = explode('.', $gaji_bulanan);
        $gaji_bulanan = join('', $gaji_bulanan);

        // Validasi Form Input
        $validator = Validator::make($request->all(), [
            'bidang_keahlian_id'        => 'required',
            'program_keahlian_id'       => 'required',
            'kompetensi_keahlian_id'    => 'required',
            'jabatan'                   => 'required|max:128',
            'perusahaan'                => 'required|max:64',
            'mulai_kerja_tahun'         => 'required|numeric|digits:4|max:2050',
            'mulai_kerja_bulan'         => 'required|max:16',
            'akhir_kerja_tahun'         => 'required|numeric|digits:4|max:2050',
            'akhir_kerja_bulan'         => 'required|max:16',
            'negara'                    => 'max:32',
            'provinsi'                  => 'max:32',
            'mata_uang'                 => 'max:4',
        ], [
            'bidang_keahlian_id.required'       => "bidang keahlian id tidak boleh kosong",
            'program_keahlian_id.required'      => "program keahlian id tidak boleh kosong",
            'kompetensi_keahlian_id.required'   => "kompetensi keahlian id tidak boleh kosong",
            'jabatan.required'                  => "jabatan tidak boleh kosong",
            'jabatan.max'                       => "jabatan maksimal 128 karakter",
            'perusahaan.required'               => "perusahaan tidak boleh kosong",
            'perusahaan.max'                    => "perusahaan maksimal 64 karakter",
            'mulai_kerja_tahun.required'        => 'mulai kerja tahun tidak boleh kosong',
            'mulai_kerja_tahun.digits'          => 'mulai kerja tahun harus 4 digit',
            'mulai_kerja_tahun.numeric'         => 'mulai kerja tahun harus angka',
            'mulai_kerja_bulan.required'        => 'mulai kerja bulan tidak boleh kosong',
            'mulai_kerja_bulan.max'             => 'mulai kerja bulan maksimal 16 karakter',
            'akhir_kerja_tahun.required'        => 'akhir kerja tahun tidak boleh kosong',
            'akhir_kerja_tahun.digits'          => 'akhir kerja tahun harus 4 digit',
            'akhir_kerja_tahun.numeric'         => 'akhir kerja tahun harus angka',
            'akhir_kerja_bulan.required'        => 'akhir kerja bulan tidak boleh kosong',
            'akhir_kerja_bulan.max'             => 'akhir kerja bulan maksimal 16 karakter',
            'negara.max'                        => "negara maksimal 32",
            'provinsi.max'                      => "provinsi maksimal 32",
            'mata_uang.max'                     => "mata_uang maksimal 4",
        ]);

        // Jika Validasi Gagal Maka akan dikembalikan ke halaman sebelumnya, ( Insert data Siswa Pendidikan Gagal )
        if ( $validator->fails() ) {
            return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
        // Lolos Validasi
        }else {

            $sekarang = (isset($request->sekarang)) ? true : false;

            $sql = SiswaPengalaman::create([
                'siswa_id' => Auth::user()->siswa->id,
                'bidang_keahlian_id' => $request->bidang_keahlian_id,
                'program_keahlian_id' => $request->program_keahlian_id,
                'kompetensi_keahlian_id' => $request->kompetensi_keahlian_id,
                'jabatan' => $request->jabatan,
                'perusahaan' => $request->perusahaan,
                'mulai_kerja_tahun' => $request->mulai_kerja_tahun,
                'mulai_kerja_bulan' => $request->mulai_kerja_bulan,
                'sekarang' => $sekarang,
                'akhir_kerja_tahun' => $request->akhir_kerja_tahun,
                'akhir_kerja_bulan' => $request->akhir_kerja_bulan,
                'negara' => $request->negara,
                'provinsi' => $request->provinsi,
                'mata_uang' => $request->mata_uang,
                'gaji_bulanan' => $gaji_bulanan,
                'keterangan' => $request->keterangan
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
