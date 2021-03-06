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

     /**
     * Return a SEO Script.
     *
     */
    public function getSeo($title)
    {
        // SEO Script
        SEOTools::setTitle($title . ' - SMK Bisa Kerja | SMK Negeri 1 Bojongsari', false);
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

    public function showProposal(Request $request) {

        if( is_null(Auth::user()->siswa->siswaPendidikan) ) {
            return redirect('/siswa/create-resume/siswa-pendidikan');
        }

        if( is_null(Auth::user()->siswa->siswaLainya) ) {
            return redirect('/siswa/create-resume/siswa-lainya');
        }

        // Mengambil SEO
        $this->getSeo('Proposal Pelamaran');

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
                'lowongan' => $lowongan,
                'navLink' => 'lamaran'
            ];

            return view('pages.jobs.show-proposal-lamaran', $data);
        }
    }

    public function lamarLowongan(Request $request)
    {
        if( is_null($request->proposal) ) {
            return redirect()->back();
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

        if($pelamaran) return redirect('/siswa/lamaran')->with('success', 'Lowongan ' . $lowongan->jabatan . ' telah dilamar');
    }

    public function lihatPelamar($id)
    {
        $lowongan = Lowongan::find(decrypt($id));

        // Mengambil SEO
        $this->getSeo('Lihat Pelamar ' . $lowongan->jabatan);

        $data = [
            'lowongan' => $lowongan,
            'pelamar' => Pelamaran::where('lowongan_id', decrypt($id))->orderBy('created_at', 'DESC')->paginate(10),
            'navLink' => 'lamaran'
        ];

        return view('pages.jobs.lihat-pelamar', $data);
    }
}
