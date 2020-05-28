<?php

namespace App\Http\Controllers\Perusahaan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Artesaos\SEOTools\Facades\SEOTools;

use App\User;
use App\Models\ProgramKeahlian;
use App\Models\BidangKeahlian;
use App\Models\StatusPelamaran;
use App\Models\Perusahaan;
use App\Models\Lowongan;
use App\Models\Bahasa;
use App\Models\Negara;
use App\Models\Provinsi;
use App\Models\Kabupaten;
use App\Models\Pelamaran;

class PelamarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($lowonganId)
    {
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

        $lowongan = Lowongan::find(decrypt($lowonganId));
        $data = [
            'nav'   => 'lowongan',
            'user' => Auth::user(),
            'perusahaan' => Perusahaan::find($lowongan->perusahaan_id),
            'pelamaran' => Pelamaran::where('lowongan_id', $lowongan->id)->get(),
            'lowongan' => $lowongan,
            'sidebar' => 'Semua Pelamar'
        ];

        return view('perusahaan.pelamar.index', $data);
    }

    public function showAllByStatus(Request $request, $lowonganId)
    {
        // Validasi Form Input
        $validator = Validator::make($request->all(), [
            'status'               => 'in:menunggu,diterima,ditolak,dipanggil|required',
        ], [
            'status.in'                     => "status harus diantara menunggu, diterima, ditolak atau dipanggil",
            'status.required'               => "status tidak boleh kosong",
        ]);

        // Jika Validasi Gagal Maka akan dikembalikan ke halaman sebelumnya, ( Insert data Lowongan Gagal )
        if ( $validator->fails() ) {
            return redirect()->back()
                                ->withErrors($validator)
                                ->withInput();
        // Lolos Validasi
        }else {
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

            $pelamarByStatus = [];
            $lowongan = Lowongan::find(decrypt($lowonganId));
            $pelamaran = Pelamaran::where('lowongan_id', $lowongan->id)->get();
            foreach($pelamaran as $pelamar) {
                if($pelamar->statusPelamaran->status == $request->status) {
                    $pelamarByStatus[] = $pelamar;
                }
            }

            $data = [
                'nav'   => 'lowongan',
                'user' => Auth::user(),
                'perusahaan' => Perusahaan::find($lowongan->perusahaan_id),
                'lowongan' => $lowongan,
                'sidebar' => $request->status,
                'pelamaran' => $pelamarByStatus
            ];

            return view('perusahaan.pelamar.index', $data);
        }
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showPelamarById($id)
    {
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

        $data = [
            'nav'   => 'lowongan',
            'user' => Auth::user(),
            'pelamar' => Pelamaran::find(decrypt($id)),
        ];

        return view('perusahaan.pelamar.show', $data);
    }

    public function showStatusPelamaran(Request $request)
    {
        $data = [
            'nav'   => 'lowongan',
            'user' => Auth::user(),
            'pelamaran' => Pelamaran::find(decrypt($request->pelamaran)),
            'status' => $request->status
        ];

        return view('perusahaan.pelamar.show-status-input', $data);
    }

    public function updateStatusPelamaran(Request $request, $idStatusPelamaran)
    {
        $validator = Validator::make($request->all(), [
            'pesan' => 'required',
            'status' => 'required|in:diterima,ditolak,dipanggil'
        ], [
            'pesan.required' => 'Pesan tidak boleh kosong',
            'status.required' => 'Status tidak boleh kosong',
            'status.in' => 'Status harus diantara: diterima, ditolak, dipanggil,'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
        } else {
            $data = StatusPelamaran::find(decrypt($idStatusPelamaran));
            $data->update([
                'status' => $request->status,
                'pesan' => $request->pesan,
            ]);

            return redirect('/perusahaan/lowongan/' . encrypt($data->pelamaran->lowongan->id) . '/pelamar');
        }
    }


    public function editStatusPelamaran($idStatusPelamaran)
    {
        $data = [
            'nav'   => 'lowongan',
            'user' => Auth::user(),
            'pelamaran' => StatusPelamaran::find(decrypt($idStatusPelamaran)),
            'opsiStatus' => ['diterima', 'ditolak', 'dipanggil']
        ];

        return view('perusahaan.pelamar.edit-status-input', $data);
    }

}
