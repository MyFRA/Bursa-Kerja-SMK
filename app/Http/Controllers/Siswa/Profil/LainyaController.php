<?php

namespace App\Http\Controllers\Siswa\Profil;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;



use App\Models\SiswaLainya;
use App\Models\Provinsi;
use App\Models\Keterampilan;

class LainyaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'nav' => 'lainya',
            'siswaLainya' => SiswaLainya::find(Auth::user()->siswa->id)
        ];

        return view('siswa.profil.lainya.index', $data);
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
        //
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
        $data = [
            'nav' => 'lainya',
            'siswaLainya' => SiswaLainya::find(decrypt($id)),
            'lokasiDiharap' => json_decode(SiswaLainya::where('siswa_id', Auth::user()->siswa->id)->pluck('lokasi_diharap')[0]),
            'provinsi' => Provinsi::orderBy('nama_provinsi', 'ASC')->get(),
            'keterampilan' => Keterampilan::orderBy('nama', 'ASC')->get()
        ];

        return view('siswa.profil.lainya.edit', $data);
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
                $siswaLainya = SiswaLainya::find(decrypt($id));
                $siswaLainya->update([
                    'siswa_id'          => Auth::user()->siswa->id,
                    'keterampilan_id'   => $request->keterampilan_id,
                    'gaji_diharapkan'   => $gaji_diharapkan,
                    'lokasi_diharap'    => json_encode($request->lokasi_diharap) ,
                    'keterangan'        => $request->keterangan
                ]);

                if( $siswaLainya ) return redirect('/siswa/profil/lainya');
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
        //
    }
}
