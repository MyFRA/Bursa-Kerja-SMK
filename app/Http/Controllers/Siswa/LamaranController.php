<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use App\Models\Pelamaran;
use App\Models\Lowongan;

class LamaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'lamaran' => Pelamaran::where('siswa_id', Auth::user()->siswa->id)->get(),
            'status' => 'Semua Lamaran'
        ];

        return view('siswa.lamaran.index', $data);
    }

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexByStatus(Request $request)
    {
        // Validasi Form Input
        $validator = Validator::make($request->all(), [
            'status'               => 'in:menunggu,diterima,ditolak,dipanggil|required',
        ], [
            'status.in'           => "status harus diantara menunggu, diterima, ditolak atau dipanggil",
            'status.required'     => "status tidak boleh kosong",
        ]);

        // Jika Validasi Gagal Maka akan dikembalikan ke halaman sebelumnya, ( Insert data Lowongan Gagal )
        if ( $validator->fails() ) {
            return redirect()->back()
                                ->withErrors($validator)
                                ->withInput();
        // Lolos Validasi
        } else {
            $lamaran = [];
            $pelamaran = Pelamaran::where('siswa_id', Auth::user()->siswa->id)->get();
            foreach($pelamaran as $pelamar) {
                if($pelamar->statusPelamaran->status == $request->status) {
                    $lamaran[] = $pelamar;
                }
            }


            $data = [
                'lamaran' => $lamaran,
                'status' => $request->status,
            ];
    
            return view('siswa.lamaran.index', $data);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = [
            'pelamar' => Pelamaran::find(decrypt($id)),
        ];

        return view('siswa.lamaran.show', $data);
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
    public function lihatPesan($id)
    {
        $data = [
            'pelamaran' => Pelamaran::find(decrypt($id))
        ];

        return view('siswa.lamaran.lihat-pesan', $data);
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
            'pelamaran' => Pelamaran::find(decrypt($id)),
        ];

        return view('siswa.lamaran.edit', $data);
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
        $pelamaran = Pelamaran::find(decrypt($id));

        $pelamaran->update([
            'proposal_pelamaran' => $request->proposal_pelamaran
        ]);

        return redirect('/siswa/lamaran')->with('success', 'Pelamaran ' . $pelamaran->lowongan->jabatan . ' telah diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Pelamaran::find(decrypt($id));
        $lowongan = Lowongan::find($data->lowongan_id);
        $jumlahPelamar = $lowongan->jumlah_pelamar - 1;
        $lowongan->update([
            'jumlah_pelamar' => $jumlahPelamar,
        ]);
        Pelamaran::destroy(decrypt($id));
        return back()->with('success', 'Pelamaran ' . $data->lowongan->jabatan . ' telah dihapus');
    }
}
