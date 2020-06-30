<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

use Artesaos\SEOTools\Facades\SEOTools;

use App\Models\Pelamaran;
use App\Models\Lowongan;

class LamaranController extends Controller
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->getSeo('Lamaran');

        $status = ($request->status) ? $request->status : 'Semua Lamaran';

        if($request->status) {
            $pelamaran = Pelamaran::select('pelamaran.*')
                                    ->where('siswa_id', Auth::user()->siswa->id)
                                    ->where('status_pelamaran.status', $status)
                                    ->join('status_pelamaran', 'pelamaran_id', '=', 'pelamaran.id')
                                    ->orderBy('created_at', 'DESC')
                                    ->paginate(6);
        } else {
            $pelamaran = Pelamaran::select('pelamaran.*')
                                    ->where('siswa_id', Auth::user()->siswa->id)
                                    ->join('status_pelamaran', 'pelamaran_id', '=', 'pelamaran.id')
                                    ->orderBy('created_at', 'DESC')
                                    ->paginate(6);
        }

        $data = [
            'status' => $status,
            'lamaran' => $pelamaran,
            'navLink' => 'lamaran'
        ];

        return view('siswa.lamaran.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->getSeo('Lamaran ' . Pelamaran::find(decrypt($id))->lowongan->jabatan );

        $data = [
            'pelamar' => Pelamaran::find(decrypt($id)),
            'navLink' => 'lamaran'
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
        $this->getSeo('Pesan lamaran ' . Pelamaran::find(decrypt($id))->lowongan->jabatan );


        $data = [
            'pelamaran' => Pelamaran::find(decrypt($id)),
            'navLink' => 'lamaran'
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
        $this->getSeo('Edit lamaran ' . Pelamaran::find(decrypt($id))->lowongan->jabatan );

        $data = [
            'pelamaran' => Pelamaran::find(decrypt($id)),
            'navLink' => 'lamaran'
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

        if(is_null($request->proposal_pelamaran))  {
            return back()->with('gagal', 'proposal tidak boleh kosong');
        }

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
