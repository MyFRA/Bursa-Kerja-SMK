<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Artesaos\SEOTools\Facades\SEOTools;

use App\Models\Lowongan;
use App\Models\Perusahaan;
use App\Models\Pelamaran;
use App\Models\StatusPelamaran;
use App\User;


class PelamaranController extends Controller
{
    public function showProposal(Request $request) {

        // Validasi Form Input
        $validator = Validator::make($request->all(), [
            'lowonganId'            => 'required',
        ], [
            'lowonganId.required'   => "Lowongan tidak boleh kosong",
        ]);

        // Jika Validasi Gagal Maka akan dikembalikan ke halaman sebelumnya, ( Insert data Siswa Pendidikan Gagal )
        if ( $validator->fails() ) {
            return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
        // Lolos Validasi
        }else {
            $lowonganId = decrypt($request->lowonganId);
            if(is_null(Lowongan::find($lowonganId))) return back();

            $lowongan = Lowongan::find($lowonganId);

            $data = [
                'perusahaan' => Perusahaan::find($lowongan->perusahaan_id),
                'lowongan' => $lowongan
            ];

            return view('pages.jobs.show-proposal-lamaran', $data);
        }
    }

    public function lamarLowongan(Request $request) 
    {
        if( is_null($request->proposal) ) {
            return redirect('/lowongan');
        };

        $lowonganId = decrypt($request->lowonganId);

        $lowongan = Lowongan::find($lowonganId);

        $lowongan->update([
            'jumlah_pelamar' => $lowongan->jumlah_pelamar + 1
        ]);

        $pelamaran = Pelamaran::create([
            'siswa_id' => Auth::user()->siswa->id,
            'lowongan_id' => $lowonganId,
            'proposal_pelamaran' => $request->proposal
        ]);

        StatusPelamaran::create([
            'pelamaran_id' => $pelamaran->id,
            'status'       => 'menunggu',
            'pesan'        => 'menunggu jawaban',
        ]);

        if($pelamaran) return redirect('/lowongan');
    }

    public function lihatPelamar($id)
    {
        $data = [
            'lowongan' => Lowongan::find(decrypt($id)),
            'pelamar' => Pelamaran::where('lowongan_id', decrypt($id))->get()
        ];

        return view('pages.jobs.lihat-pelamar', $data);
    }
}